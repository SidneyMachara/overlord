<nav class="navbar navbar-default myNavbar">
  <div class="container-fluid">
    <!-- logo -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar" name="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>


      <a href="#" class="navbar-brand">Over-Lord</a>
    </div>
    <!-- menu items -->
    <div class="collapse navbar-collapse" id="mainNavBar">
      <ul class="nav navbar-nav ">
        <li class="active"><a href="#">home</a></li>
        <li ><a href="#">gallery</a></li>
        <li ><a href="#footer">contact</a></li>
        <li><a  id="coverlink">Cover</a></li>
      </ul>

    </div>

  </div>

</nav>

<script type="text/javascript">
    $(document).ready(function()
    {
       $("#coverlink").click(function() {
       $(".cover").show(1000)
       });

       $("#uncoverlink").click(function() {
       $(".cover").hide(1000)
       });
     });
 </script>


<div class="cover">

  <a   id="uncoverlink" ><center>&#8686; </center></a>
</div>
