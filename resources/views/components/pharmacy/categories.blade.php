@include('include.header')
<style rel="stylesheet">
  .card-header, .modal-header{
    background-color:skyblue;
    color:white;
  }
  .modal-body{
    color:black;
  }

    /* TABLE SCROLL, PAGINATION AND SEARCH BAR */
    #categories_table_filter{
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
            <h1 class="m-0"><i class="fas fa-list"></i> Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><a><i class="fas fa-list"></i> Categories</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <div class="card">
        <div class="card-header">
          <h3>
            Categories - {{count($categories)}} 
            <button style="color:white;" class="btn btn-success pull-right" data-toggle="modal" data-target="#addCategory">
              <i class="fas fa-plus"></i>
              ADD NEW CATEGORY
            </button>
          </h3>
          <!-- ADD CATEGORY MODAL -->
          <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <!-- MODAL HEADER -->
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">add a new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action=" {{ route('add_category') }} " method="POST">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="category"><span style="color:red;">*</span>Title</label>
                        <input type="text" name="category" id="category" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="category"><span style="color:red;">*</span>Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value="Add">
                      <input type="reset" class="btn btn-secondary" value="Reset">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="card-body">
        @if(count($categories) !== 0)
          <table class="table table-striped table-bordered table-sm" cellspacing="0" style="width:100%;" id="categories_table">
            <!-- TABLE HEAD -->
            <thead>
              <tr>
                <th>NO</th>
                <th>CATEGORY</th>
                <th>DESCRIPTION</th>
                <th>ACTIONS</th>
              </tr>
            </thead>

            <!-- TABLE BODY -->
            <tbody>
              <?php $no = 1; ?>
              
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->description }}</td>
                    <td id="category_actions">
                      <!-- <a  class="btn btn-outline-primary" title="Edit"><i class="fas fa-edit"></i></a> -->
                      <a href="{{ route('delete_category', ['category_id'=>$category->id]) }}" class="btn btn-outline-danger" title="Delete"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
              @else
                <center style="font-style:italic" class="text-bold p-5">No category found!</center>
              
            </tbody>
            @endif
          </table>
        </div>
      </div>
    </main>
  </div>
  <!-- /.content-wrapper -->

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    $(document).ready(function(){
      $("title").html("Categories");

      $('#categories_table').DataTable({
        "scrollX": true
      });
      $('.dataTables_length').addClass('bs-select');
    });    
  </script>
@include('include.footer')

<script>
  // IF CREATED SHOW THIS MESSAGE
  @if(Session::has('category_created'))
    swal({
      'title':'CREATED',
      'text':"{{ Session::get('category_created') }}",
      'icon':'success'
    });
  @endif

  // IF DELTED SHOW THIS MESSAGE
  @if(Session::has('category_deleted'))
    swal({
      'title':'DELETED',
      'text':"{{ Session::get('category_deleted') }}",
      'icon':'info'
    });
  @endif
</script>




