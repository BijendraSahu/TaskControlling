<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
{{--<link href="{!! url('fonts/Font Awesome 5.4.css') !!}" rel="stylesheet">--}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css"
      integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns"
      crossorigin="anonymous">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .input-group-text{
        background-color: #dc3545;
        border-color:#dc3545 ;
        color: white;
    }
    .custom-select-sm{
         width: 427px;
        /*background-color: #dc3545;*/
        border-color:#dc3545 ;
        /*color: white;*/
     }
    select:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    input[type=text]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    input[type=email]:focus{
        box-shadow: 1px 0px 8px #dc3545
    }
    input[type=password]:focus{
             box-shadow: 1px 0px 8px #dc3545
         }
    .form-control[type=text]{
        border-color:#dc3545;
    } .form-control[type=email]{
          border-color:#dc3545;
      }
    .form-control[type=password]{
        border-color:#dc3545;
    }
    .dropdown-menu{
        z-index: 10;
        display: none;
        position: absolute;
        box-shadow: 1px 8px 16px 1px rgba(0,0,0,0.2);
        min-width: 100px;
    }
    .dropdown:hover .dropdown-menu {display: block;}
    div.dropdown-menu>a:hover {
        color: #000000;
        text-decoration: none;
        background-color: #e3f2fd;
    }
    .dropdown-item{
        padding: 3px 10px;

    }
    @media only screen and (max-width:800px) {
        /* For tablets: */
        .main {
            width: 80%;
            padding: 0;
        }

        .right {
            width: 100%;
        }
    }
    @media only screen and (max-width:520px) {
        /* For mobile phones: */
        .dropdown-menu, .custom-select-sm{
            width: 100%;

        }
    }
    /*.topnav a:hover{*/
        /*background-color: #dc3545;*/
        /*!*text-color: white;*!*/
    /*}*/
</style>
<script type="text/javascript">

        $(document).ready(function () {
            loader_function('hide');
            if(sessionStorage.getItem("Added"))
            { $('#alertmsg').show();
                $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Added</spane>');
                $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
                sessionStorage.clear();
            }else if(sessionStorage.getItem("Updated")){
                $('#alertmsg').show();
                $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Updated</spane>');
                $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
                sessionStorage.clear();
            }
            else if(sessionStorage.getItem("Deleted")){
                $('#alertdel').show();
                $('#alertdel').html('<span style="color: #dc3545;" class="far fa-check-circle fa-2x"> Deleted</spane>');
                $("#alertdel").fadeIn("slow").delay(2000).fadeToggle("slow");
                sessionStorage.clear();
            }
                else if(sessionStorage.getItem("Done")){
                $('#alertmsg').show();
                $('#alertmsg').html('<span style="color: #3b7348;" class="far fa-check-circle fa-2x"> Payment Accepted</spane>');
                $("#alertmsg").fadeIn("slow").delay(2000).fadeToggle("slow");
                sessionStorage.clear();
                }

        });


</script>