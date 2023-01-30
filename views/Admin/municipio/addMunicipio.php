<div class="container">
  <h3 class="mt-5">Importar municipios</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12">
      <!-- Contenido -->

      <div class="outer-container">
        <form action="?controller=municipio&method=addExcel" method="POST" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
          <div>
            <label>Elija Archivo Excel</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">
            <button type="submit" id="submit" name="import" class="btn-submit">Importar Registros</button>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-6 col-md-6  mt-4">
        <a href="?controller=municipio&method=new" class="btn btn-success"><i class="fas fa-plus"></i></a>
        </div>
        <div class="col-6 col-md-6">
        <div class="header-icon header-icon header-search header-search-inline header-search-category w-lg-max text-left">
          <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
          <form action="#" method="POST">
            <div class="header-search-wrapper">
              <label for="">nombre:</label>
              <input type="search" class="form-control" name="name" id="name" placeholder="Buscar municipio..." required>
              <button class="btn icon-search p-0" type="submit"></button>
            </div>
            <!-- End .header-search-wrapper -->
          </form>
        </div>
        </div>
      </div>

      <table class=' table table-striped'>
        <thead>
          <tr>
            <th>Departamento</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Flete</th>
            <th>Funcion</th>
          </tr>
        </thead>
        <tbody id="content">
          
        </tbody>
      </table>
      <script>
        getData()

        document.getElementById("name").addEventListener("keyup", getData);

        function getData() {
          let input = document.getElementById("name").value
          let content = document.getElementById("content")
          let url = "?controller=municipio&method=searchName";
          let formaData = new FormData()
          formaData.append("name", input)

          fetch(url, {
              method: "POST",
              body: formaData
            }).then(response => response.json())
            .then(data => {
              content.innerHTML = data
            }).catch(err => console.log(err))
        }
      </script>
      <!-- Fin Contenido -->
    </div>
  </div>
</div>