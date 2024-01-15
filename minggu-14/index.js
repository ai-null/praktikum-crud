const mysql = require('mysql')
const express = require("express")
let ejs = require('ejs')
const app = express()

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'web_crud'
})

connection.connect()

// configuration and middleware
app.set('view engine', 'ejs');
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.set('views', __dirname + '/view');

// static assets
app.use('/assets', express.static('assets'))

// state of the website
const dataState = {
  siswa: [],
};

const uiState = {
  title: 'Manajemen Sekolah',
  isError: false,
  isInsertError: false,
  isDeleteError: false,
  isUpdateError: false,
}

// routes
app.get('/', (_, res) => {
    res.redirect('/home')
})

app.route('/home')
  .get((_, res, next) => {
    const state = { ...uiState, ...dataState }
    connection.query("SELECT * FROM member", (error, results) => {
      if (error) {
        state.isError = true
        res.render('add_siswa', state)
        return
      }

      state.isError = false
      dataState.siswa = results
      state.siswa = results
      res.render('add_siswa', state)
      next()
    })
  })
  .post((req, res) => {
    const state = { ...uiState, ...dataState }
    let data = req.body;
    let isMember = data.id_member != null && data.id_member != ''

    if (data.is_delete != undefined && isMember) {
      // delete
      console.log('delete')
      connection.query(`DELETE FROM member where id_member = ${data.id_member}`, (error, results) => {
        if (error) {
          state.isDeleteError = true
          res.render('add_siswa', { ...state })
          return
        }
        
        state.isDeleteError = false
        res.redirect('/home')
      })
      return
    }

    else if (data.submit != undefined) {
      // update
      if (isMember) {
        console.log('update')
        let updateQuery = 'UPDATE member SET ' +
          `first_name = '${data.first_name}', ` +
          `last_name = '${data.last_name}', ` +
          `kota = '${data.kota}', ` +
          `provinsi = '${data.provinsi}', ` +
          `kode_pos = '$${data.kode_pos}', ` +
          `kelas = '${data.kelas}' WHERE id_member = ${data.id_member};`

        connection.query(updateQuery, (error, _) => {
          if (error) {
            console.log(error)
            state.isUpdateError = true
            res.render('add_siswa', {...state})
            return
          }

          res.redirect('/home')
          return
        })
      } else {
        // insert
        console.log('insert')
        let insertQuery = `INSERT INTO member VALUES (null, 
          '${data.first_name}', '${data.last_name}', '${data.kota}', 
          '${data.provinsi}', '$${data.kode_pos}', '${data.kelas}');`
        connection.query(insertQuery, (error, _) => {
          if (error) {
            state.isInsertError = true
            res.render('add_siswa', {...state})
            return
          } else {
            res.redirect('/home')
          }
        })
      }
    } else {
      state.isError = true
      res.redirect('/home')
    }
  })

app.listen(3000, () => {
    console.log(`Example app listening on port 3000`)
})