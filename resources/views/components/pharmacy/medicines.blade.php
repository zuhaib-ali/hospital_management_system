@include('include.header')

@include('include.navbar')    

@include('include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MEDICINES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">HOME</a></li>
              <li class="breadcrumb-item active">MEDICINES</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      @if(Session::get('user')->role == 'admin')
          <div class="card">
            <div class="card-header" style="background-color:darkblue;">
              <h3 style="color:red;">
                MEDICINES
                <button style="color:white;" class="btn btn-success pull-right" data-toggle="modal" data-target="#addMedicine">
                  <i class="fas fa-plus"></i>
                  ADD NEW MEDICINE
              </button>
              </h3>
            </div>
          <div class="card-body">
          @if(count($medicines) !== 0)
            <table class="table table-hover table-bordered text-center">
            
              <!-- TABLE HEAD -->
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAME</th>
                  <th>CATEGORY</th>
                  <th>COMPANY</th>
                  <th>COMPOSITION</th>
                  <th>GROUP</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>

              <!-- TABLE BODY -->
              
              <tbody>
                <?php $no = 1; ?>
                  @foreach($medicines as $medicine)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $medicine->medicine_name }}</td>
                      <td>{{ $categories->find(1)->category }}</td>
                      <td>{{ $medicine->company }}</td>
                      <td>{{ $medicine->composition }}</td>
                      <td>{{ $medicine->group }}</td>
                      <td><a href="{{ route('delete_medicine', ['medicine_id'=>$medicine->id]) }}" class="btn btn-outline-danger">DELETE</a></td>
                    </tr>
                  @endforeach
                @else
                  <center style="font-style:italic" class="text-bold p-5">No medicine found!</center>
                
              </tbody>
              @endif
            </table>
          </div>
        </div>

        @elseif(Session::get('user')->role == 'user')
          <div class="card">
            <div class="card-header" style="background-color:darkblue;">
              <h3 style="color:red;">
                MEDICINES
              </h3>
            </div>
          <div class="card-body">
          @if(count($medicines) !== 0)
            <table class="table table-hover table-bordered text-center" id="myTable">
            
              <!-- TABLE HEAD -->
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAME</th>
                  <th>CATEGORY</th>
                  <th>COMPANY</th>
                  <th>COMPOSITION</th>
                  <th>GROUP</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>

              <!-- TABLE BODY -->
              
              <tbody>
                <?php $no = 1; ?>
                  @foreach($medicines as $medicine)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $medicine->medicine_name }}</td>
                      <td>{{ $medicine->category_id }}</td>
                      <td>{{ $medicine->company }}</td>
                      <td>{{ $medicine->composition }}</td>
                      <td>{{ $medicine->group }}</td>
                      <td>
                        <button class="btn btn-sm btn-primary" id="btn">
                          <i class="fas fa-cart-plus"></i>
                          Add To Cart
                        </button>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <center style="font-style:italic" class="text-bold p-5">No medicine found!</center>
                
              </tbody>
              @endif
            </table>
          </div>
        </div>
      @endif()
    </main>
  </div>
  <!-- /.content-wrapper -->

  <!-- ADD CATEGORY MODAL -->
  <div class="modal fade" id="addMedicine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- MODAL HEADER -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">add a new medicine</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- FORM -->
        <form action=" {{ route('add_new_medicine') }} " method="POST">
          @csrf
          <div class="modal-body">
            <!-- MEDICINE NAME -->
            <div class="form-group">
                <label for="medicine_name"><span style="color:red;">*</span>Name</label>
                <input type="text" name="medicine_name" class="form-control">
            </div>

            <!-- CATEGORY -->
            <div class="form-group">
                <label for="category"><span style="color:red;">*</span>Category</label>
                <select name="category" id="category" class="form-control">
                    @if(count($categories) !== 0)
                        @foreach($categories as $category)
                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- COMPANY -->
            <div class="form-group">
                <label for="company"><span style="color:red;">*</span>Company</label>
                <input type="text" name="company" class="form-control">
            </div>

            <!-- COMPOSITION -->
            <div class="form-group">
                <label for="composition"><span style="color:red;">*</span>Composition</label>
                <input type="text" name="composition" class="form-control">
            </div>

            <!-- GROUP -->
            <div class="form-group">
                <label for="group"><span style="color:red;">*</span>Group</label>
                <select name="group" id="group" class="form-control">
                    <option value="Tablel">Tablel</option>
                    <option value="Capsule">Capsule</option>
                    <option value="Syrup">Syrup</option>
                </select>
            </div>
          </div>

          <!-- MODAL FOOTER -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            <input type="submit" class="btn btn-primary" value="SAVE CHANGES">
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- MODAL HEADER -->
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Medicine To Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- FORM -->
        <form action="" method="POST">
          @csrf
          <div class="modal-body">
            <!-- MEDICINE NAME -->
            <div class="form-group">
                <label for="medicine_name"><span style="color:red;">*</span>Name</label>
                <input type="text" name="medicine_name" id="tName" class="form-control" disabled>
            </div>

            <!-- CATEGORY -->
            <div class="form-group">
                <label for="category"><span style="color:red;">*</span>Category</label>
                <input type="text" name="category" id="tCat" class="form-control" disabled>
                
            </div>

            <!-- GROUP -->
            <div class="form-group">
                <label for="category"><span style="color:red;">*</span>Group</label>
                <input type="text" name="group" id="Tgroup" class="form-control" disabled>
                
            </div>

            
            <div class="form-group">
                <label for="group"><span style="color:red;">*</span>Quantity</label>
                <input type="number" name="qty" class="form-control">
            </div>
          </div>

          <!-- MODAL FOOTER -->
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                <i class="ft-x"></i>
                Close
              </button>
              <button type="button" class="btn btn-sm btn-success">
                <i class="fa fa-plus"></i>
                Add
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('include.footer')

<script>

  $(document).ready(function(){
   
    
   
   $("#myTable").on('click','#btn',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD
         var col3=currentRow.find("td:eq(5)").text(); // get current row 2nd TD

         $('#tName').val(col1);
         $('#tCat').val(col2);
         $('#Tgroup').val(col3);
         $('#cart').modal('show');
    });

  });

  // IF CREATED SHOW THIS MESSAGE
  @if(Session::has('medicine_created'))
    swal({
      'title':'MEDICINE CREATED',
      'text':"{{ Session::get('medicine_created') }}",
      'icon':'success'
    });
  @endif

  // IF DELTED SHOW THIS MESSAGE
  @if(Session::has('medicine_deleted'))
    swal({
      'title':'MEDICINE DELETED',
      'text':"{{ Session::get('medicine_deleted') }}",
      'icon':'info'
    });
  @endif


  </script>




