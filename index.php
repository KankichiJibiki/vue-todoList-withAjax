<!doctype html>
<html lang="en">

<head>
  <title>Vue.js & Ajax</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>

<body>

  <main class="container-fluid bg-dark" id="app">
    <div class="d-flex justify-content-center align-items-center">
        <div class="bg-light col-9 p-3 m-4">
            <form action="" method="post" class="input-group col-12 mb-3">
              <input type="text" name="task" id="task" class="form-control" placeholder="Write your new Task" v-model="task">
              <button type="button" class="btn btn-dark input-group-btn" v-bind:disabled="task.length != 0 ? false : true" @keyup.enter="insertData()" @click="insertData()">Create</button>
            </form>

            <div class="items col-12 card p-4 mb-3" v-for="(row, index) in allData">
                <h2 class="mb-2">TODO {{ index + 1 }}: {{ row.title }}</h2>
                <button type="button" class="row btn btn-danger col-2" v-bind:data-index="row.id" @click="deleteData(row.id)">Delete</button>
            </div>
            <div v-if="allData.length === 0">
                <h4 class="text-center">list does not exist yet</h4>
            </div>


        </div>
    </div>
  </main>

  
  <script src="assets/js/main.js"></script>
  <!-- <script src="assets/js/ajax.js"></script> -->

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>