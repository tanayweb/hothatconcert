<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>Airtel | Hothat Concert</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="{{asset('assets/font/Telenor-Medium.otf')}}" rel="stylesheet">
            <link href="{{asset('assets/font/TelenorLight.otf')}}" rel="stylesheet">
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        </head>
        <body>
            <section>
                <div class="sliderWraper">
                    <div class="sliderImg">
                        <img src="{{asset('assets/images/main-1.png')}}" alt="banner img">
                    </div>
                </div>
            </section>
            <section>
                <div class="formWraper"> 
                    <img class="pathMainLeft displayNone" src="{{asset('assets/images/path.png')}}" alt="path">
                    <img class="pathMainTop displayNone" src="{{asset('assets/images/path_2.png')}}" alt="path">
                    <img class="pathMainfoot displayNone" src="{{asset('assets/images/pathMainfoot.png')}}" alt="path">
                    <img class="pathMaindown displayNone" src="{{asset('assets/images/pathMaindown.png')}}" alt="path">
                    <img class="triangle displayNone" src="{{asset('assets/images/shapetri.PNG')}}" alt="path">
                    <img class="tri1 displayNone" src="{{asset('assets/images/tri1.PNG')}}" alt="path"> 
                    <img class="guiterPath displayNone" src="{{asset('assets/images/bolt.png')}}" alt="path">
                    <img class="plusPath displayNone" src="{{asset('assets/images/ftr-shape-1.png')}}" alt="path">
                    <form class="form">
                        <p>Registration</p>  
                        <div class="eachInput">
                            <span>Name * </span>
                            <input type="text" id="name" placeholder="Same as photo identity proof" required>
                        </div>
                        <div class="eachInput"> 
                            <span>Mobile *** </span>
                            <input type="text" id="mobile" maxlength="11" placeholder="Type your 11 digit Mobile number">
                        </div>
                        <div class="eachInput"> 
                            <span>Email * </span>
                            <input type="email" id="email" placeholder="Type your valid Email address for Ticket">
                        </div>
                        <div class="eachInput"> 
                            <span>Gender * </span>
                            <div class="gwraper">
                                <legend>Select</legend> 
                                <div class="gSelect">
                                    <input type="radio" name="gender" value="Male" checked>Male<br>      
                                    <input type="radio" name="gender" value="Female">Female<br>      
                                    <input type="radio" name="gender" value="Other">Other<br>      
                                </div>
                            </div>
                        </div>
                        <div class="eachInput">    
                            <span>DOB * </span>
                            <input type="text" id="dob" placeholder="Enter DOB">
                        </div>
                        <div class="eachInput"> 
                            <span>Profession * </span>
                            <div class="gwraper">
                                <legend>Select</legend> 
                                <div class="gSelect">
                                    <Select id="profession">
                                        <option value="Engineer">Student</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="engineer">Engineer</option>
                                        <option value="Lawyear">Lawyear</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Job_Holder">Job Holder</option>
                                        <option value="Businessman">Businessman</option>
                                        <option value="Other">Other</option>
                                    </Select>  
                                </div>
                            </div>
                        </div>
                        <div class="eachInput"> 
                            <span>Institution</span>
                            <input type="text" id="institution" placeholder="Enter Institution">
                        </div>
                        <div class="eachInput"> <span>FB/Insta ID</span>
                            <input type="text" id="social" placeholder="Enter Link"> </div>
                        <div class="eachInput"> 
                            <span></span>
                            <div class="textAreaWraper">
                                <p id="line">Where did you know about this Hotath Concert</p>
                                <textarea class="areaInput" id="about" name="Write Here" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="eachInput"> 
                            <span></span>
                            <div class="submitBtn">
                                <div class="submitwraper">
                                    <input type="button" id="btnSubmit" value="Submit" style="cursor:pointer;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section>
                <div class="fotWraper">
                    <div class="footerImg">
                        <img src="{{asset('assets/images/footer-2.png')}}" alt="banner img">
                    </div>
                </div>
            </section>
            <!--FontAwsome link-->
            <script src="https://kit.fontawesome.com/c63790eb54.js" crossorigin="anonymous"></script>
            <!-- bootstrap js link-->
            <script>
                $(document).ready(function(){
                    $("#dob").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                    $('#btnSubmit').click(function(){
                        var gender = $('input[name="gender"]:checked').val();
                        var name = $('#name').val();
                        var mobile = $('#mobile').val();
                        var email = $('#email').val();
                        var profession = $('#profession').val();
                        var institution = $('#institution').val();
                        var social = $('#social').val();
                        var about = $('#about').val();
                        var dob = $('#dob').val();

                        if(!name){
                            alert('Please enter name');
                            return false;
                        }
                        if(!mobile){
                            alert('Please enter mobile number');
                            return false;
                        }
                        if(!email){
                            alert('Please enter email');
                            return false;
                        }
                        if(!dob){
                            alert('Please enter date of birth');
                            return false;
                        }

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('register')}}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                name : name ,
                                mobile : mobile,
                                email : email,
                                dob : dob,
                                gender : gender,
                                profession : profession,
                                institution : institution,
                                social : social,
                                about : about
                            },
                            success: function(response) {
                                if(response){
                                    alert('SMS sending successful !');
                                }
                            }
                        });
                    });
                });
            </script>
        </body>
    </html>