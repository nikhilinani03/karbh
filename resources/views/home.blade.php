<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
   <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Find Data</h2> <br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
        </div>
        <div class="col-md-6 text-end">
          <a href="{{url('logout')}}">Logout</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">parent id</th>
      <th scope="col">position</th>
      <th scope="col">status</th>
      <th scope="col">created_at</th>
      <th scope="col">updated_at</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($data as $d)
    <tr>
      <td>{{$d->id}}</td>
      <td>{{$d->name}}</td>
      <td>{{$d->parent_id}}</td>
      <td>{{$d->position}}</td>
      <td>{{$d->status}}</td>
      <td>{{$d->created_at}}</td>
      <td>{{$d->updated_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</html>