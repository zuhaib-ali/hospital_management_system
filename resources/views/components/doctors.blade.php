@include('include.header')

<style rel="stylesheet">

  .cards{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-between;
  }

  .card{
    background-color:#6699CC;
    width:300px;
    height:150px;
    padding:20px 0px;
    line-height:50px;
    box-shadow:2px 1px 0px grey;
    color:white;
    font-size:18px;
    user-select:none;
    border-radius:20px;
  }

  .card:hover{
    background-color:	#6085ab;
    text-shadow:1px 0px 0px darkblue;
  }

  .card:active{
    background-color:#4a6886;
  }

</style>

@include('include.navbar')    

@include('include.sidebar')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    doctors
  </div>

@include('include.footer')