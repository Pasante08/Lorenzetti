<div class="container">
  <h3 class="mt-5">Importar productos</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12">
      <!-- Contenido -->
      <div class="outer-container">
        <form action="?controller=productosis&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
          <div>
            <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
            <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>
          </div>
        </form>
      </div>
      <div class="col-6 col-md-6 float-right">
        <div class="header-icon header-icon header-search header-search-inline header-search-category w-lg-max text-left">
          <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
          <form action="#" method="POST">
            <div class="header-search-wrapper">
              <label for="">Codigo:</label>
              <input type="search" class="form-control" name="cod" id="cod" placeholder="Buscar producto..." required>
              <button class="btn icon-search p-0" type="submit"></button>
            </div>
            <!-- End .header-search-wrapper -->
          </form>
        </div>
      </div>

      <table class='tutorial-table'>
        <thead>
          <tr>
            <th>idProducto</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>voltaje_id</th>
            <th>color_id</th>
            <th>producto_id</th>
            <th>estado</th>
            <th>funciones</th>
          </tr>
        </thead>
        <tbody id="content">
          
        </tbody>
      </table>
      <script>
        getData()

        document.getElementById("cod").addEventListener("keyup", getData);

        function getData() {
          let input = document.getElementById("cod").value
          let content =  document.getElementById("content")
          let url = "?controller=productosis&method=searchCod";
          let formaData = new FormData()
          formaData.append("cod", input)
          console.log(formaData)

          fetch(url, {
            method: "POST",
            body: formaData
          }).then(response => response.json())
          .then(data => {
            content.innerHTML = data
          }).catch(err => console.log(err))
        }
      </script>
    </div>
  </div>
</div>