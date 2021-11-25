@include('include.header')
<style>
  .card-header, .modal-header{
    background-color:skyblue;
    color:white;
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
            <h1 class="m-0">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><i class="fas fa-list"></i> Add Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <main class="m-3">
      <div class="card">
        <div class="card-header">
          <h3>
            CATEGORIES
            <button style="color:white;" class="btn btn-success pull-right" data-toggle="modal" data-target="#addCategory">
              <i class="fas fa-plus"></i>
              ADD NEW CATEGORY
          </button>
          </h3>
          
        </div>
        <div class="card-body">
        @if(count($categories) !== 0)
          <table class="table table-hover table-bordered text-center">
            <!-- TABLE HEAD -->
            <thead>
              <tr>
                <th>NO</th>
                <th>CATEGORY</th>
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
                    <td>
                      <a href="{{ route('delete_category', ['category_id'=>$category->id]) }}" class="btn btn-outline-danger">DELETE</a>
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
            <label for="category"><span style="color:red;">*</span>Category Name</label>
            <input type="text" name="category" id="category" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            <input type="submit" class="btn btn-primary" value="SAVE CHANGES">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- SWEET ALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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




