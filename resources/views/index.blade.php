<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- google fonts link -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
      <link
          href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,700;0,800;0,900;0,1000;1,800;1,900;1,1000&family=Protest+Guerrilla&family=Roboto+Condensed:ital,wght@0,100;0,200;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,300;0,500;1,100;1,700;1,900&display=swap"
          rel="stylesheet">
      <!--bootstrap link-->
      <!-- <link rel="stylesheet" href="style/bootstrap.css"> -->
      <!-- <link rel="stylesheet" href="style/bootstrap.min.css"> -->
      <!--Main link-->
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
      <!--Main responsive link-->
      <!-- <link rel="stylesheet" href="style/responsive.css"> -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Airtel</title>
</head>
<body>
    <section>
        <div class="sliderWraper">

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">

                    <div class="sliderImg">
                        <img src="{{asset('assets/images/mainBanner.png')}}" alt="banner img">
                    </div>

                </div>
            </div>

           

        </div>
    </section>


    <section>
        <div class="formWraper"> 
            <img class="pathMainLeft" src="{{asset('assets/images/path.png')}}" alt="path">

            <img class="pathMainTop" src="{{asset('assets/images/path_2.png')}}" alt="path">

            <img class="pathMainfoot" src="{{asset('assets/images/pathMainfoot.png')}}" alt="path">
            <img class="pathMaindown" src="{{asset('assets/images/pathMaindown.png')}}" alt="path">
            <img class="triangle" src="{{asset('assets/images/triangle.png')}}" alt="path">
            <img class="tri1" src="{{asset('assets/images/tri1.PNG')}}" alt="path">



            <!-- <div class="pathgroup">
                <div class="path1">
                   
                </div>
            </div> -->
            
            <form action="" class="form">
                <p>Registration</p>
                <span>Name * </span>
                <input type="text" id="name" placeholder="same as photo identity proof">
                <br>
                <span>Mobile *** </span>
                <input type="number" id="mobile" placeholder="Type your 11 digit Mobile number">
                <br>
                <span>Email * </span>
                <input type="email" id="email" placeholder="Type your valid Email address for Ticket">

                <br> 
               
                <span>Gender * </span>
                <div class="gwraper">
                    <legend>Select</legend> 
                    <div class="gSelect">
                             
                        <input type="checkbox" name="Male" value="Cats">Male<br>      
                        <input type="checkbox" name="Female" value="Dogs">Female<br>      
                        <input type="checkbox" name="Other" value="Birds">Other<br>      
                    </div>
                </div>
                
                  
               

                <br><span>DOB * </span>
                <input type="number" id="dob" placeholder="15yrs+">
                <br> 
                <span>profession * </span>
                <div class="gwraper">
                    <legend>Select</legend> 
                    <div class="gSelect">
                        <Select id="profession">
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                            <option value="Teacher">Teacher</option>
                        </Select>  
                         
                    </div>

                   
                    
                </div>
                


                <br><span>Institution</span>
                <input type="number" id="institution" placeholder="Optional">
                <br>
                <span>FB/Insta ID</span>

                <input type="text" id="fb" placeholder="Optional">
                

                <div class="textAreaWraper">
                    <p>Where did you know about this Hotath Concert</p>

                   <textarea class="areaInput" name="Write Here" id="about" cols="30" rows="10"></textarea>
                  
                </div>

                <div class="submitBtn">
                    <div class="submitwraper">
                        <input type="button" id="btnSubmit" value="submit">
                    </div>
                </div>

              
            </form>
        </div>
    </section>


    <section>
        <div class="fotWraper">

            <div class="footerImg">
                <img src="{{asset('assets/images/footer.png')}}" alt="banner img">
            </div>

        </div>
    </section>

       <!--FontAwsome link-->
       <script src="https://kit.fontawesome.com/c63790eb54.js" crossorigin="anonymous"></script>
       <!-- bootstrap js link-->
       <!-- <script src="js/bootstrap.js"></script>
       <script src="js/bootstrap.min.js"></script> -->
       <!-- Main js -->
       <!-- <script src="js/program.js"></script> -->
       <script>
            $(document).ready(function(){
                $('#btnSubmit').click(function(){
                    $(".gSelect input[type='checkbox']:checked").each(function() {
                        var checkboxValue = $(this).val();
                    });
                    var name = $('#name').val();
                    var mobile = $('#mobile').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('register')}}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            name : name ,
                            mobile : mobile
                        },
                        success: function(response) {
                            if(response){
                                if(response == 1){
                                    alert('SMS sending successful !');
                                }
                            }
                        }
                    });
                });
            });        
       </script>
</body>
</html>