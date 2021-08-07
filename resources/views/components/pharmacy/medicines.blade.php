@include('include.header')
<!-- SELECT 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style rel="stylesheet">
  .card-header, .modal-header{
    background-color:skyblue;
    color:white;
  }

  .modal-body{
    color:black;
  }

      /* TABLE SCROLL, PAGINATION AND SEARCH BAR */
      #medicine_table_filter{
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-end;
    }
  
    .dtHorizontalExampleWrapper {
        margin: 0 auto;
    }
    #dtHorizontalExample th, td {
        white-space: nowrap;
    }

    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }

    .pagination{
        justify-content:flex-end;
    }

</style>
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
              <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> HOME</a></li>
              <li class="breadcrumb-item active"> <a> <i class="fas fa-pills"></i> MEDICINES</a> </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      @if(Session::get('user')->role == 'admin')
          <div class="card">
            <div class="card-header">
              <h3>
                <i class="fas fa-pills"></i> Drugs - {{ count($medicines) }}
                <button style="color:white;" class="btn btn-success pull-right" data-toggle="modal" data-target="#addMedicine">
                  <i class="fas fa-plus"></i>
                  ADD NEW MEDICINE
              </button>
              </h3>

              <!-- ADD Medicine MODAL -->
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
                          <div class="form-row">
                            <!-- MEDICINE NAME -->
                            <div class="form-group col-sm-6">
                                <label for="medicine_name">Name</label>
                                <input type="text" name="medicine_name" class="form-control">
                            </div>
                            <!-- CATEGORY -->
                            <div class="form-group col-sm-6">
                                <label for="category">Category</label>
                                <select name="category" id="category" class="form-control">
                                    @if(count($categories) !== 0)
                                        @foreach($categories as $category)
                                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <!-- PURCHASE PRICE -->
                            <div class="form-group col-sm-4">
                                <label for="purchage_price">Purchase Price</label>
                                <input type="number" name="purchase_price" id="purchage_price" class="form-control">
                            </div>

                            <!-- SALE PRICE -->
                            <div class="form-group col-sm-4">
                                <label for="sale_price">Sale Price</label>
                                <input type="number" name="sale_price" id="sale_price" class="form-control">
                            </div>

                            <!-- STORE BOX -->
                            <div class="form-group col-sm-4">
                                <label for="store_box">Store Box</label>
                                <input type="number" name="store_box" id="store_box" class="form-control">
                            </div>
                          </div>
                          <div class="form-row">
                            <!-- QUANTITY -->
                            <div class="form-group col-sm-4">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control">
                            </div>

                            <!-- GENERIC NAME -->
                            <div class="form-group col-sm-4">
                                <label for="generic_name">Generic Name</label>
                                <input type="text" name="generic_name" id="generic_name" class="form-control">
                            </div>

                            <!-- COMPANY -->
                            <div class="form-group col-sm-4">
                                <label for="company">Company</label>
                                <input type="text" name="company" id="company" class="form-control">
                            </div>
                          </div>
                          <div class="form-row">
                            <!-- EFFECTS -->
                            <div class="form-group col-sm-4">
                                <label for="effects">Effects</label>
                                <input type="text" name="effects" id="effects" class="form-control">
                            </div>

                            <!-- EXPIRY DATE -->
                            <div class="form-group col-sm-5">
                                <label for="expire_date">Expire</label>  
                                <input type="date" name="expire_date" id="expire_date" class="form-control">
                            </div>
                          </div>
                      </div>

                      <!-- MODAL FOOTER -->
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Add Medicine">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- / ADD MEDICIN MODAL -->

            </div>
          <div class="card-body">
          @if(count($medicines) !== 0)
            <table class="table table-hover table-bordered" id="medicine_table" style="width:100%; overflow-x:scroll">
              <!-- TABLE HEAD -->
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAME</th>
                  <th>CATEGORY</th>
                  <th>STORE BOX</th>
                  <th>PURCHASE</th>
                  <th>SALE</th>
                  <th>QUANTITY</th>
                  <th>GENERIC NAME</th>
                  <th>COMPANY</th>
                  <th>EFFECTS</th>
                  <th>EXPIRE</th>
                  <th>ACTIONS</th>
                </tr>
              </thead>
                            
              <tbody>
                <?php $no = 1; ?>
                  @foreach($medicines as $medicine)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $medicine->medicine_name }}</td>
                      <td>{{ $categories->find($medicine->category_id)->category }}</td>
                      <td>{{ $medicine->store_box }}</td>
                      <td>{{ $medicine->purchase_price }}</td>
                      <td>{{ $medicine->sale_price }}</td>
                      <td>{{ $medicine->quantity }}</td>
                      <td>{{ $medicine->generic_name }}</td>
                      <td>{{ $medicine->company }}</td>
                      <td>{{ $medicine->effects }}</td>
                      <td>{{ $medicine->expire_date }}</td>
                      <td>
                        <a  class="btn btn-outline-primary"><i class="fas fa-info"></i> </a>

                        <!-- EDIT -->
                        <a  class="btn btn-outline-secondary" data-toggle="modal" data-target="#edit_medicine_modal"><i class="fas fa-edit"></i> </a>
                        <!-- EDIT MEDICINE MODAL -->
                        <div class="modal fade" id="edit_medicine_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <!-- MODAL HEADER -->
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update medicine {{ $medicine->medicine_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <!-- FORM -->
                              <form action=" {{ route('update_medicine') }} " method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-row">
                                      <!-- MEDICINE NAME -->
                                      <div class="form-group col-sm-6">
                                          <input type="hidden" name="id" value="{{ $medicine->id }}">
                                          <label for="medicine_name">Name</label>
                                          <input type="text" name="medicine_name" value="{{ $medicine->medicine_name }}" class="form-control">
                                      </div>
                                      <!-- CATEGORY -->
                                      <div class="form-group col-sm-6">
                                          <label for="category">Category</label>
                                          <select name="category" id="category" class="form-control">
                                              @if(count($categories) !== 0)
                                                  @foreach($categories as $category)
                                                    @if($category->id == $medicine->category_id)
                                                      <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                                                    @else
                                                      <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                    @endif
                                                      
                                                  @endforeach
                                              @endif
                                          </select>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <!-- PURCHASE PRICE -->
                                      <div class="form-group col-sm-4">
                                          <label for="purchage_price">Purchase Price</label>
                                          <input type="number" name="purchase_price" value="{{ $medicine->purchase_price }}" id="purchage_price" class="form-control">
                                      </div>

                                      <!-- SALE PRICE -->
                                      <div class="form-group col-sm-4">
                                          <label for="sale_price">Sale Price</label>
                                          <input type="number" name="sale_price" value="{{ $medicine->sale_price }}" id="sale_price" class="form-control">
                                      </div>

                                      <!-- STORE BOX -->
                                      <div class="form-group col-sm-4">
                                          <label for="store_box">Store Box</label>
                                          <input type="number" name="store_box"  value="{{ $medicine->store_box }}" id="store_box" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <!-- QUANTITY -->
                                      <div class="form-group col-sm-4">
                                          <label for="quantity">Quantity</label>
                                          <input type="number" name="quantity" value="{{ $medicine->quantity }}" id="quantity" class="form-control">
                                      </div>

                                      <!-- GENERIC NAME -->
                                      <div class="form-group col-sm-4">
                                          <label for="generic_name">Generic Name</label>
                                          <input type="text" name="generic_name" value="{{ $medicine->generic_name }}" id="generic_name" class="form-control">
                                      </div>

                                      <!-- COMPANY -->
                                      <div class="form-group col-sm-4">
                                          <label for="company">Company</label>
                                          <input type="text" name="company" value="{{ $medicine->company }}" id="company" class="form-control">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <!-- EFFECTS -->
                                      <div class="form-group col-sm-4">
                                          <label for="effects">Effects</label>
                                          <input type="text" name="effects" value="{{ $medicine->effects }}" id="effects" class="form-control">
                                      </div>

                                      <!-- EXPIRY DATE -->
                                      <div class="form-group col-sm-5">
                                          <label for="expire_date">Expire</label>  
                                          <input type="date" name="expire_date" value="{{ $medicine->expire_date }}" id="expire_date" class="form-control">
                                      </div>
                                    </div>
                                </div>

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                  <input type="submit" class="btn btn-primary" value="Add Medicine">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- / EDIT MEDICINE MODAL -->



                        <a href="{{ route('delete_medicine', ['medicine_id'=>$medicine->id]) }}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <center style="font-style:italic" class="text-bold p-5">no medicine found!</center>
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
            <table class="table table-hover table-bordered" id="myTable">
            
              <!-- TABLE HEAD -->
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAME</th>
                  <th>COMPANY</th>
                  <th>SALE</th>
                  <th>EXPIRE</th>
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
                      <td>{{ $medicine->company }}</td>
                      <td>{{ $medicine->sale_price }}</td>
                      <td>{{ $medicine->expire_date }}</td>
                      <td>
                        <button class="btn btn-sm btn-success">
                          <i class="ft-eye"></i>
                          View
                        </button>
                        <button class="btn btn-sm btn-primary" id="btn" data-toggle="modal" data-target="#cart_modal">
                          <i class="fas fa-cart-plus"></i>
                          Add To Cart
                        </button>

                        <!-- ADD TO CART MODAL -->
                        <div class="modal fade" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                  <!-- MEDICINE NAME -->
                                  <div class="form-group">
                                      <label for="medicine_name">Name</label>
                                      <input type="text" value="{{ $medicine->medicine_name }}" class="form-control" disabled>
                                      <input type="hidden" name="medicine_name" value="{{ $medicine->medicine_name }}">
                                  </div>

                                  <!-- CATEGORY -->
                                  <div class="form-group">
                                      <label for="category">Category</label>
                                      <input type="text" value="{{ $categories->find($medicine->category_id)->category }}" class="form-control" disabled>
                                      <input type="hidden" name="category" value="{{ $categories->find($medicine->category_id)->category }}">
                                      
                                  </div>

                                  <!-- GROUP -->
                                  <div class="form-group">
                                      <label for="description">Description</label>
                                      <input type="text" value="{{ $categories->find($medicine->category_id)->description }}" class="form-control" disabled>
                                      <input type="hidden" name="description" value="{{ $categories->find($medicine->category_id)->description }}">
                                  </div>

                                  
                                  <div class="form-group">
                                      <label for="quantity">Quantity</label>
                                      <input type="number" name="quantity" class="form-control">
                                  </div>
                                </div>

                                <!-- MODAL FOOTER -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="ft-x"></i> Close</button>
                                  <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>Add</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
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


    <!-- JQUERY -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>  
  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('include.footer')

<script>
  $(document).ready(function(){

    // PAGE TITLE
    $("title").html("Medicines");

    // TABLE SCROLL BAR AND SEARCH BAR.
    $('#medicine_table').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
    
   
   $("#myTable").on('click','#btn',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         
         var col1=currentRow.find("td:eq(1)").text(); // get current row 1st TD value
         var col2=currentRow.find("td:eq(2)").text(); // get current row 2nd TD value
         var col3=currentRow.find("td:eq(5)").text(); // get current row 3rd TD value

         $('#tName').val(col1);
         $('#tCat').val(col2);
         $('#Tgroup').val(col3);

        //  $('#tName1').val(col1);
        //  $('#tCat1').val(col2);
        //  $('#Tgroup1').val(col3);

        //  $('#cart').modal('show');
    });

  });

  // IF CREATED SHOW THIS MESSAGE
  @if(Session::has('medicine_created'))
    swal({
      'title':'Added',
      'text':"{{ Session::get('medicine_created') }}",
      'icon':'success'
    });
  @endif

  @if(Session::has('added'))
    swal({
      'title':'Added To Cart',
      'text':"{{ Session::get('added') }}",
      'icon':'success'
    });
  @endif

  // IF DELTED SHOW THIS MESSAGE
  @if(Session::has('medicine_updated'))
    swal({
      'title':'Updated',
      'text':"{{ Session::get('medicine_updated') }}",
      'icon':'info'
    });
  @endif

  // IF DELTED SHOW THIS MESSAGE
  @if(Session::has('medicine_deleted'))
    swal({
      'title':'Deleted',
      'text':"{{ Session::get('medicine_deleted') }}",
      'icon':'info'
    });
  @endif
</script>




