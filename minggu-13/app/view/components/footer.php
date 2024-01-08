<script>
        var btnClear = document.getElementById("btn-clear")
        var btnDelete = document.getElementById("btn-delete")

        var heading = document.getElementById("heading")

        var els = document.getElementsByClassName("selectable-data")
        const listOfFields = [
            document.getElementById("validationDefault00"),
            document.getElementById("validationDefault01"),
            document.getElementById("validationDefault02"),
            document.getElementById("validationDefault03"),
            document.getElementById("validationDefault04"),
            document.getElementById("validationDefault05"),
            document.getElementById("validationDefault06"),
        ]

        Array.prototype.forEach.call(els, function(el) {
            el.addEventListener("click", function() {
                doSomething(el)
            })
        });

        function doSomething(el) {
            btnClear.style.visibility = 'visible'
            btnDelete.style.visibility = 'visible'
            heading.innerText = 'Update data from the row'
            for (let index = 0; index < el.children.length; index++) {
                const element = el.children[index];
                listOfFields[index].value = el.children[index].innerText
            }
        }

        btnClear.addEventListener("click", function() {
            heading.innerText = 'Add new data to the row'
            btnDelete.style.visibility = 'hidden'
            btnClear.style.visibility = 'hidden'
            for (let index = 0; index < listOfFields.length; index++) {
                listOfFields[index].value = ''
            }
        })
    </script>
</body>

</html>