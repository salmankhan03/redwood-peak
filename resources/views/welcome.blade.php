<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Redwood Peak Limited – Hong Kong based asset manager focused on fund & separate account management</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/redwood_favicon_32x32.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .icon-pdf::before {
            content: '\f1c1'; /* Example content for PDF icon, assuming using FontAwesome */
            font-family: 'FontAwesome';
            padding-right: 8px;
            font-size:25px;
            color:red
        }
       
        .elementor-icon-list-item a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }
        .elementor-icon-list-item .icon-pdf {
            margin-right: 10px;
            color: #d9534f; /* Red color for the PDF icon */
        }
        .meta-lists {
            margin-top: 5px;
            font-size: 0.9em;
            color: #888;
        }
        .meta-date i {
            margin-right: 5px;
        }
        .bgImges{
            background-image: url('{{ asset('assets/images/background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat; 
            background-attachment: fixed;
        }
        .modal-body {
            max-height: 300px;
            overflow-y: auto;
        }

        .modal-dialog {
            /* max-width: 800px; */
        }
        .popupContent{
            /* position: absolute; */
            /* top: 20px; */
            /* /* left: 20px;
            right: 20px; 
            bottom: 70px; */
            overflow: auto;
            background-color: #ffffff;
            /* padding: 15px; */
        }

        #submitDisclaimer {
            color: #fff;
        }

        #submitDisclaimer:hover,
        #submitDisclaimer:focus {
            color: #000;
        }

        #submitDisclaimer:disabled {
            color: #ccc;
        }

        #rejectDisclaimer {
            color: #fff;
        }

        #rejectDisclaimer:hover,
        #rejectDisclaimer:focus {
            color: #000;
        }

        #rejectDisclaimer:disabled {
            color: #ccc;
        }



    </style>
</head>
<body>
    <div class="container">
        @include('header')
    </div>
    <div class="bgImges">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/slider_img1.jpg') }}" alt="Slide 1">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row pt-0 mr-0 ml-0 row-padding">
                <div class="col-md-12 col-lg-4 pr-0 pl-0">  
                    <div class="card p-5" style="background-color:#04243d">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h5 class="card-title cards-titles">22 OCTOBER 2023, 08.00 PM EDT</h5>
                            <h2 class="cards-headings text-white">Smart investing strategies:<br> building wealth for the future</h2>
                        </div>
                        <div class="p-0 pt-3" style="background-color:#fff0 !important">
                            <button type="button" class="btn btn-primary">Learn More</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mr-0 ml-0 pr-0 pl-0">
                    <div class="card p-5 card-bg-img">
                        <h5 class="cards-headings">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </h5>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mr-0 ml-0 pr-0 pl-0">
                    <div class="card p-5 d-none" style="background-color:#fff">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h5 class="card-title cards-titles primaryColor">News</h5>
                            <h2 class="cards-Label mb-3 mt-3">Global Investment Trends:<br> Opportunities and Risks in 202</h2>
                            <h6 class="card-title mt-3">APRIL 3, 2022</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 ml-5 mr-5">
                <h5 class="text-center" style="color:#380000"> / Services</h5>
                <h2 class="pt-2" >
                    Discover our expertise by <br /> learning what we offer
                </h2>
                <div class="mt-3 mb-5">
                    <div class="row row-padding">
                        <div class="col-md-4 mt-4">
                            <div class="card card-shadow ">
                                <img src="{{ asset('assets/images/service_img1.jpg') }}" class="card-img-top" alt="Image 1">
                                <div class="card-body text-left ">
                                    <h5 class="card-title cards-Label primaryColor">Portfolio Management</h5>
                                    <p class="card-text text-left p-0">
                                        Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                    </p>
                                    <div>
                                        <button type="button" class="btn btn-primary w-auto mt-3">Learn More</button>
                                    </div>
                                </div>
                                <!-- <div class="card-footer text-left">
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-shadow ">
                                <img src="{{ asset('assets/images/service_img2.jpg') }}" class="card-img-top" alt="Image 2">
                                <div class="card-body text-left">
                                    <h5 class="card-title cards-Label primaryColor">Financial Planning</h5>
                                    <p class="card-text text-left p-0">
                                        Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                    </p>
                                    <div>
                                        <button type="button" class="btn btn-primary w-auto mt-3">Learn More</button>
                                    </div>
                                </div>
                                <!-- <div class="card-footer text-left">
                                    <button type="button" class="btn btn-primary">Learn More</button>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-shadow ">
                                <img src="{{ asset('assets/images/service_img3.jpg') }}" class="card-img-top" alt="Image 3">
                                <div class="card-body text-left">
                                    <h5 class="card-title cards-Label primaryColor">Wealth Management</h5>
                                    <p class="card-text text-left p-0">
                                        Cultivating change enthusiasts fuels success, resulting in superior, more efficient, and robust innovations.
                                    </p>      
                                    <div>
                                        <button type="button" class="btn btn-primary w-auto mt-3">Learn More</button>
                                    </div>             
                                </div>
                                <!-- <div class="card-footer text-left">
                                    <button type="button" class="btn btn-primary">Learn More</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 ml-5 mr-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="welcome-title-class">Our View</h2>
                        <div class="mt-3">
                            <ul style="list-style: none">
                                <li class="mt-2"> <span class="icon-pdf"> </span> China Outlook Q1 2023</li>
                                <li class="mt-2">  <span class="icon-pdf"> </span> China Outlook Q4 2022</li>
                                <li class="mt-2">  <span class="icon-pdf"> </span> China Outlook Q3 2022</li>
                                <li class="mt-2">  <span class="icon-pdf"> </span> China Outlook Q2 2022</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2 class="welcome-title-class">Latest News</h2>
                        <div class="mt-3">
                            <ul class="list-unstyled">
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <!-- <span class="icon-pdf"> </span> -->
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Global Investment Trends: Opportunities and Risks in 2023</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>    
                                                    03 Apr 2022    
                                                </span>        
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Effective Asset Management Strategies for Sustainable Growth</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>    
                                                    03 Apr 2022    
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">Tech Giants' Investment Plans in Artificial Intelligence Raise Eyebrows</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>    
                                                    03 Apr 2022    
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="elementor-icon-list-item">
                                    <a href="{{ route('login') }}">
                                        <span class="icon-pdf"></span>
                                        <div class="ekit_post_list_content_wraper">
                                            <span class="elementor-icon-list-text">ESG Principles Transforming Investment Landscape: What You Need to Know</span>
                                            <div class="meta-lists">
                                                <span class="meta-date">
                                                    <i aria-hidden="true" class="icon icon-clock2"></i>    
                                                    03 Apr 2022    
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('footer')
    </div>

    <!-- Modal HTML -->
    <div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: rgba(15,15,15,.6) !important;border-radius: 12px;">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="disclaimerModalLabel" style="color:#380000">Website – Disclaimer and Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div> -->
      <div class="modal-body popupContent m-3">
        <center class="pt-3 pb-3"><span style="font-size: 20px; font-family: Calibri, sans-serif; color: #700000;"><strong>Website – Disclaimer and Registration</strong></span></center>
        <form id="disclaimerForm">
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">The information contained in this website is issued by Redwood Peak Limited (“Redwood Peak”). This website is not directed to any person in any jurisdiction where doing so would contravene any laws or regulations.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">Redwood Peak’s services and products have not been authorized by the Securities and Futures Commission of Hong Kong pursuant to the Cap 571 of the Securities &amp; Futures Ordinance (“SFO”) of the laws of Hong Kong. If you are resident in Hong Kong, you are confirming that you are a “Professional Investor” as defined under the SFO by accessing any information in this website.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">The content of this website does not constitute an offer to sell or a solicitation to purchase, nor an advice or a recommendation to acquire or dispose of any investment or to engage in any other transaction, and should not be distributed to, or used by, any person or entity, in any jurisdiction where such activities would be unlawful or where it would require Redwood Peak to be registered, licensed, authorized, approved or otherwise qualified. The information contained in this website is not intended to provide professional advice and should not be relied upon in that regard. Persons accessing this website are advised to obtain appropriate professional advice where necessary.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">Redwood Peak has taken all reasonable care in preparing this website and the information in this website is provided to the best of its knowledge. However, no representation or warranty, expressed or implied, is made as to the accuracy, adequacy, completeness or thoroughness of this website, and Redwood Peak will not accept any liability (including any third party liability) for any errors or omissions nor for any losses or damages losses caused by the information or the use of the information in this website.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">Redwood Peak may post new information from time to time without prior notice, and it does not assume any obligation to update or correct any information and explicitly disclaims any duty to do so. All copyright, patent, intellectual and other property rights contained herein is owned by Redwood Peak, with the exception of material included with the permission of the rights’ owner. Information in this website may not be reproduced, distributed or published without prior consent of Redwood Peak.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">Investment involves risk. Past performance is not indicative of future result of an investment. The value of an investment may fall as well as rise and may become valueless; investors may not be able to recover the amount invested.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">If you proceed to visit this website, it will be considered that you have acknowledged and ensured that you are permitted to access and use the information in this website by local laws and rules of the place where you are residing (“Qualified User”), as well as that you have read and understood the disclaimer, which you have accepted and agreed with.</p>
        <p style="font-size: 14px; font-family: Calibri, sans-serif; color: #666666;">If you want to visit this website, you have to confirm that you are aware that you are a Qualified User, otherwise, please do not visit this website.</p>    
        <p>&nbsp;</p>  
        <p>User Declaration:</p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="agreeCheckbox">
            <p for="agreeCheckbox">
                I declare that I am a Qualified User and have read, understood and agreed to all the terms as set out in the Disclaimer, and choose to proceed to the website and access its information contained therein.
            </p>
          </div>
        </form>
      </div>
      <div class="modal-footer" style="justify-content: flex-start; border-top:none">
            <button type="button" class="btn btn-primary border-0 shadow-none" id="submitDisclaimer" disabled style="width:auto;">Accept Disclaimer</button>
            <button type="button" class="btn btn-primary border-0 shadow-none ml-2" id="rejectDisclaimer" data-dismiss="modal" style="width:auto">Reject Disclaimer</button>
        </div>
    </div>
  </div>
</div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#disclaimerModal').modal('show');

            const checkbox = document.getElementById('agreeCheckbox');
            const submitButton = document.getElementById('submitDisclaimer');
            
            checkbox.addEventListener('change', function () {
            submitButton.disabled = !checkbox.checked;
            });
            
            document.getElementById('submitDisclaimer').addEventListener('click', function () {
            
            $('#disclaimerModal').modal('hide');
            });

            $('#disclaimerModal').on('hide.bs.modal', function (e) {
            if (!checkbox.checked) {
                e.preventDefault();
            }
            });
        });
    </script>
</body>
</html>
