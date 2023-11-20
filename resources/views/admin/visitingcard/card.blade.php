@extends('admin.layouts.app')
@section('content')
    <div class="page-wrapper null compact-wrapper" id="pageWrapper">
        <div class="page-body-wrapper">
            <div class="page-body">
                {{-- card 1 --}}
                <style>
                    * {
                        box-sizing: border-box
                    }

                    .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
                        width: 100%
                    }

                    body {
                        margin: 0;
                        background: #1d2848;
                        /* height: 100vh; */
                        display: -webkit-flex;
                        display: flex;
                        -webkit-align-items: center;
                        align-items: center;
                    }

                    #container {
                        width: 600px;
                        height: 340px;
                        margin: 0 auto;
                        position: relative;
                        -webkit-perspective: 1000;
                        -moz-perspective: 1000;
                        perspective: 1000;
                        -moz-transform: perspective(1400px);
                        -ms-transform: perspective(1400px);
                        -webkit-transform-style: preserve-3d;
                        -moz-transform-style: preserve-3d;
                        transform-style: preserve-3d;
                        -webkit-perspective-origin: right;
                        -moz-perspective-origin: right;
                        perspective-origin: right;
                    }

                    #card_cards {
                        margin-top: 10px;
                        width: 600px;
                        height: 340px;
                        box-shadow: 0 27px 55px 0 rgba(0, 0, 0, .7), 0 17px 17px 0 rgba(0, 0, 0, .5);
                        position: relative;
                        -webkit-transform: rotate(0deg);
                        -moz-transform: rotate(0deg);
                        -ms-transform: rotate(0deg);
                        transform: rotate(0deg);
                        -webkit-transform-origin: 100% 0%;
                        -moz-transform-origin: 100% 0%;
                        -ms-transform-origin: 100% 0%;
                        transform-origin: 100% 0%;
                        -webkit-transform-style: preserve-3d;
                        -moz-transform-style: preserve-3d;
                        transform-style: preserve-3d;
                        transition: .8s ease-in-out;
                    }

                    #logo_card {
                        width: 200px;
                        height: 200px;
                        position: relative;
                        background:
                            linear-gradient(45deg, #F5AF69 50%, #F4EED7 50.9%),
                            linear-gradient(90deg, #FC5135 50%, #4E203C 50%),
                            linear-gradient(-45deg, #F5AF69 50%, #E8D9A0 50.9%),
                            linear-gradient(#FC5135 50%, #4E203C 50%),
                            linear-gradient(-45deg, #F5AF69 50%, #E8D9A0 50.9%),
                            linear-gradient(90deg, #FC5135 50%, #4E203C 50%),
                            linear-gradient(45deg, #FC5135 50%, #F5AF69 50.9%);
                        background-size: 50px 50px, 100px 50px, 50px 50px, 200px 100px, 50px 50px, 100px 50px, 50px 50px;
                        background-repeat: no-repeat;
                        background-position: 0 0, 50px 0px, 150px 0, 0 50px, 0 150px, 50px 150px, 150px 150px;
                    }

                    #logo_card:before {
                        content: "";
                        position: absolute;
                        top: 30px;
                        left: 30px;
                        width: 140px;
                        height: 140px;
                        -webkit-transform: rotate(45deg);
                        -moz-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);
                        background: linear-gradient(45deg, #F4EED7 50%, #E8D9A0 50%);
                    }

                    #logo_card:after {
                        content: "";
                        position: absolute;
                        top: 55px;
                        left: 55px;
                        width: 90px;
                        height: 90px;
                        -webkit-transform: rotate(45deg);
                        -moz-transform: rotate(45deg);
                        -ms-transform: rotate(45deg);
                        transform: rotate(45deg);
                        background: linear-gradient(45deg, #FC5135 50%, #4E203C 49.9%),
                            linear-gradient(-45deg, #F5AF69 50%, transparent 50%),
                            linear-gradient(#FC5135 50%, #FC5135 50%),
                            linear-gradient(-45deg, #4E203C 50%, transparent 50%);
                        background-size: 45px 45px;
                        background-repeat: no-repeat;
                        background-position: 0 0, 0 45px, 45px 45px, 45px 0;
                        border-radius: 0 50% 50% 50%;
                    }

                    #logo_card span {
                        display: block;
                        background: #4E203C;
                        width: 29px;
                        height: 32px;
                        position: absolute;
                        top: 99.5px;
                        left: 130px;
                        border-radius: 0 50% 50% 0;
                    }

                    #logo_card span:before {
                        content: "";
                        width: 10px;
                        height: 10px;
                        background: #E8D9A0;
                        border-radius: 50%;
                        position: absolute;
                        top: 11px;
                        left: 10px;
                        z-index: 2;
                    }

                    #front_card,
                    #back_card {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: white;
                        -webkit-backface-visibility: hidden;
                        -moz-backface-visibility: hidden;
                        backface-visibility: hidden;
                    }

                    #front_card {
                        display: -webkit-flex;
                        display: flex;
                        -webkit-justify-content: center;
                        justify-content: center;
                        -webkit-align-items: center;
                        align-items: center;
                        z-index: 2;
                        -webkit-transform: rotateY(0deg);
                        -moz-transform: rotateY(0deg);
                        -ms-transform: rotateY(0deg);
                        transform: rotateY(0deg);
                    }

                    #back_card {
                        -webkit-transform: rotateY(-180deg);
                        -moz-transform: rotateY(-180deg);
                        -ms-transform: rotateY(-180deg);
                        transform: rotateY(-180deg);
                        font-family: 'Arimo', sans-serif;
                    }

                    #container:hover .card {
                        -webkit-transform: rotateY(180deg) translateX(100%);
                        -moz-transform: rotateY(180deg) translateX(100%);
                        -ms-transform: rotateY(180deg) translateX(100%);
                        transform: rotateY(180deg) translateX(100%);
                        cursor: pointer;
                    }

                    #container2:hover .card {
                        -webkit-transform: rotateY(-180deg) translateX(100%);
                        -moz-transform: rotateY(-180deg) translateX(100%);
                        -ms-transform: rotateY(-180deg) translateX(100%);
                        transform: rotateY(-180deg) translateX(100%);
                        cursor: pointer;
                    }

                    #ul_card {
                        margin: 0;
                        width: 100%;
                        list-style: none;
                        position: absolute;
                        bottom: 30px;
                        left: 0;
                        padding: 0 1%;
                    }

                    #ul1_card {
                        margin: 0;
                        width: 100%;
                        list-style: none;
                        position: absolute;
                        bottom: 30px;
                        left: 0;
                        padding: 0 1%;
                    }

                    #ul4_card {
                        margin: 0;
                        width: 100%;
                        list-style: none;
                        position: absolute;
                        bottom: 30px;
                        left: 0;
                        padding: 0 1%;
                    }
                    #ul_card:after {
                        content: '';
                        display: table;
                        clear: both;
                    }

                    #li_tag {
                        width: 31.3333333333%;
                        margin: 0 1%;
                        float: left;
                        padding: 10px;
                        border: 2px solid #FC5135;
                        border-radius: 4px;
                        position: relative;
                        text-align: center;
                        color: #4E203C;
                        white-space: nowrap;
                    }

                    #li1_tag {
                        width: 31.3333333333%;
                        margin: 0 1%;
                        float: left;
                        padding: 10px;
                        border: 2px solid #35dbfc;
                        border-radius: 4px;
                        position: relative;
                        text-align: center;
                        color: #4E203C;
                        white-space: nowrap;
                    }
                    #li4_tag {
                        width: 31.3333333333%;
                        margin: 0 1%;
                        float: left;
                        padding: 10px;
                        border: 2px solid #e5fa29;
                        border-radius: 4px;
                        position: relative;
                        text-align: center;
                        color: #4E203C;
                        white-space: nowrap;
                    }

                    #li4_tag:before {
                        position: absolute;
                        top: -25px;
                        left: 50%;
                        margin-left: -15px;
                        width: 30px;
                        height: 30px;
                        background: #dcf614;
                        color: white;
                        line-height: 30px;
                        text-align: center;
                        border-radius: 50%;
                        font-family: FontAwesome;
                    }
                    #li_tag:before {
                        position: absolute;
                        top: -25px;
                        left: 50%;
                        margin-left: -15px;
                        width: 30px;
                        height: 30px;
                        background: #FC5135;
                        color: white;
                        line-height: 30px;
                        text-align: center;
                        border-radius: 50%;
                        font-family: FontAwesome;
                    }

                    #li_tag:nth-child(1):before {
                        content: "\f095"
                    }

                    #li_tag:nth-child(2):before {
                        content: "\f003"
                    }

                    #li_tag:nth-child(3):before {
                        content: "\f0c1"
                    }
                    /* **card4 */
                    #li4_tag:nth-child(1):before {
                        content: "\f095"
                    }

                    #li4_tag:nth-child(2):before {
                        content: "\f003"
                    }

                    #li4_tag:nth-child(3):before {
                        content: "\f0c1"
                    }

                    #h1_card {
                        color: #FC5135;
                        text-transform: uppercase;
                        font-weight: 400;
                        line-height: 1;
                        margin-top: 110px;
                        text-align: center;
                        font-size: 40px;
                    }

                    #h1_card span {
                        color: #4E203C;
                        display: block;
                        font-size: .45em;
                        letter-spacing: 3px;
                    }

                    #h1_card i {
                        font-style: normal;
                        text-transform: none;
                        font-family: 'Playfair Display', serif;
                    }

                    /*card3  */
                    #h2_card {
                        color: #28efd3;
                        text-transform: uppercase;
                        font-weight: 400;
                        line-height: 1;
                        margin-top: 110px;
                        text-align: center;
                        font-size: 40px;
                    }

                    #h2_card span {
                        color: #4E203C;
                        display: block;
                        font-size: .45em;
                        letter-spacing: 3px;
                    }

                    #h2_card i {
                        font-style: normal;
                        text-transform: none;
                        font-family: 'Playfair Display', serif;
                    }
                    /* card 4 */
                    #h4_card {
                        color: #dfc50c;
                        text-transform: uppercase;
                        font-weight: 400;
                        line-height: 1;
                        margin-top: 110px;
                        text-align: center;
                        font-size: 40px;
                    }

                    #h4_card span {
                        color: #4E203C;
                        display: block;
                        font-size: .45em;
                        letter-spacing: 3px;
                    }

                    #h4_card i {
                        font-style: normal;
                        text-transform: none;
                        font-family: 'Playfair Display', serif;
                    }
                    /* card 2 */
                    #container2 {
                        width: 600px;
                        height: 340px;
                        margin: 0 auto;
                        position: relative;
                        -webkit-perspective: 1000;
                        -moz-perspective: 1000;
                        perspective: 1000;
                        -moz-transform: perspective(1400px);
                        -ms-transform: perspective(1400px);
                        -webkit-transform-style: preserve-3d;
                        -moz-transform-style: preserve-3d;
                        transform-style: preserve-3d;
                        -webkit-perspective-origin: right;
                        -moz-perspective-origin: right;
                        perspective-origin: right;
                    }

                    #back_card2 {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background: white;
                        -webkit-backface-visibility: hidden;
                        -moz-backface-visibility: hidden;
                        backface-visibility: hidden;
                    }

                    #back_card2 {
                        -webkit-transform: rotateY(-180deg);
                        -moz-transform: rotateY(-180deg);
                        -ms-transform: rotateY(-180deg);
                        transform: rotateY(-180deg);
                        font-family: 'Arimo', sans-serif;
                    }

                    #front_card2 {
                        background-image: url({{asset('bc-front.jpg')}});
                        background-size: cover;
                    }

                    #back_card2 {
                        background-image: url({{asset('bc-back.jpg')}});
                        background-size: cover;

                        #h1_card2,
                        #p_card2,
                        .font-a-icons {
                            color: $black;
                            font-family: $lato;
                            margin-left: 30%;
                            line-height: 90%;
                        }

                        #h1_card2 {
                            margin-top: 5%;
                        }

                        #h2_card2,
                        #p_card2,
                        .font-a-icons {
                            color: $black;
                            font-family: $lato;
                            margin-left: 30%;
                            line-height: 90%;
                        }

                        #h2_card2 {
                            margin-top: 5%;
                        }

                        /* card4 */
                        #h4_card2,
                        #p_card2,
                        .font-a-icons {
                            color: $black;
                            font-family: $lato;
                            margin-left: 30%;
                            line-height: 90%;
                        }

                        #h4_card2 {
                            margin-top: 5%;
                        }

                        #p_card2 {
                            font-size: 18px;
                            padding-bottom: 24px;
                            width: 43%;
                            border-bottom: 2px solid $black;
                            padding-top: 11px;
                        }

                        #font-a-icons_card2 {
                            margin-top: 25px;

                            #icon-group_card2 {
                                margin-top: 8px;
                            }

                            #span_card2,
                            .link,
                            .fa,
                            #a_card2 {
                                color: $black;
                            }

                            .fa {
                                font-size: 18px;
                            }

                            #span_card2,
                            #a_card2 {
                                font-size: 16px;
                            }

                            #a_card2,
                            .website {
                                text-decoration: none;
                            }

                            #a_card2:hover,
                            .website:hover {
                                color: #3f3f3f;
                            }
                        }

                        #icon-box-card2 {
                            position: relative;
                            color: $black;
                            font-size: 24px;
                            height: 45px;
                            width: 45px;
                            padding: 5px;
                            top: 75px;
                            left: 30%;
                            display: inline-block;
                            border: 2px solid $black;
                            margin: 5px;
                            text-align: center;
                            cursor: pointer;
                            -webkit-transition: all ease 0.5s;
                            -moz-transition: all ease 0.5s;
                            transition: all ease 0.5s;
                        }

                        #icon-box-card2:hover {
                            box-shadow: inset 0 50px 0 0 $black;
                            color: $white;
                        }
                    }

                    #front_card2,
                    #back_card2 {
                        height: 350px;
                        width: 600px;
                    }

                    #front_card2,
                    #back_card2 {
                        backface-visibility: hidden;
                        position: absolute;
                    }

                    /*card 3  */
                    #front_card3 {
                          display: flex;
                          align-items: center;
                          justify-content: center;
                          height: 100%;
                          text-align: center;
                      }

                      #logo_card3 {
                          color: #46f5dd;;
                          font-size: 40px;
                          text-transform: uppercase;
                          margin-top: 20px;
                          white-space: nowrap;
                      }

                      #logo_card3 span {
                          display: block;
                          font-size: 18px;
                          margin-top: 10px;
                      }

                    /* Back styling */
                    /* #back_card3 {
                                                    background: #15CCC0;
                                                    padding: $padding;
                                                } */

                    #name_card3 {
                        color: #3B3B3B;
                        margin-bottom: 0;
                    }

                    #info_card3 {
                        position: absolute;
                        bottom: $padding;
                        left: $padding;
                        color: #3b3b3b;
                    }

                    #property_card3 {
                        color: #fff;
                    }
                    #front_card1 {
                    height: 100%;
                    background-image: url({{asset('cardbg5_front.jpeg')}});
                    background-size: cover;
                    background-position: center;
                    }
                    #back_card1 {
                    /* height: 100%; */
                    background-image: url({{asset('cardbg5_front.jpeg')}});
                    /* background-size: cover;
                    background-position: center; */
                    }

                    .card1 .back1 {
            transform: rotateX(180deg);
        }
                </style>
                <div class="row" style="margin-right: 5%">
                    {{-- card 1 --}}
                    <div class="col-sm-6">
                            <div class="container container1" id="container" style="margin-right:16%">
                                <div>
                                    <a  onclick="card1()" type="button" style="background-color: #141212;
                                    border: none;
                                    color: white;
                                    padding: 15px 32px;
                                    text-align: center;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 16px;
                                    margin: 4px 2px;
                                    cursor: pointer;">Demo</a>
                            </div>
                                <div class="card card1" id="card_cards">
                                    <div class="front front1" id="front_card">
                                        <div class="logo" id="logo_card"><span></span></div>
                                    </div>
                                    <div class="back back1" id="back_card">
                                        <h1 id="h1_card">Helen Parker<span>design <i>&</i> photography</span></h1>
                                        <ul id="ul_card">
                                            <li id="li_tag">+1-111-111-11-11</li>
                                            <li id="li_tag">my-email@email.com</li>
                                            <li id="li_tag">my-site.com</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                           
                    </div>
                    {{-- card 2 --}}
                    <div class="col-sm-6">
                        <div class="container2" id="container2" style="margin-right:31%">
                            <div>
                                <a  onclick="card2()" type="button" style="background-color: #141212;
                                border: none;
                                color: white;
                                padding: 15px 32px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                cursor: pointer;">Demo</a>
                        </div>
                            <div class="card card2" id="card_cards">
                                <div class="front front2" id="front_card2"></div>
                                <div class="back_class2 back2" id="back_card2">
                                    <h1 id="h1_card2">Petrus Rex</h1>
                                    <p id="p_card2">Web Design & Development</p>
                                    <div class="font-a-icons" id="font-a-icons_card2">
                                        <div class="icon-group" id="icon-group_card2">
                                            <span class="bold" id="span_card2">T: </span><span
                                                class="contact">512-773-0889</span>
                                            <div class="icon-group">
                                                <span class="bold" id="span_card2">E: </span><a class="contact"
                                                    href="mailto:hello@petrusrex.com" target="_top">hello@petrusrex.com</a>
                                            </div>
                                            <div class="icon-group" id="icon-group_card2">
                                                <a class="contact" href="http://www.petrusrex.com"
                                                    target="_blank">www.petrusrex.com</a>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="icon-box" id="icon-box-card2" href="https://www.facebook.com/xpetrus.rex"
                                        target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a class="icon-box" id="icon-box-card2" href="https://twitter.com/Gothburz"
                                        target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a class="icon-box" id="icon-box-card2" href="https://plus.google.com/u/0/+PetrusRex/"
                                        target="_blank"><i class="fa fa-google-plus"></i></a>
                                    <a class="icon-box" id="icon-box-card2" href="https://www.linkedin.com/in/xpetrus"
                                        target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a class="icon-box" id="icon-box-card2" href="https://codepen.io/Gothburz/"
                                        target="_blank"><i class="fa fa-codepen"></i></a>
                                    <a class="icon-box" id="icon-box-card2" href="https://github.com/Gothburz"
                                        target="_blank"><i class="fa fa-github"></i></a>
                                    {{-- <div class="back" id="back_card">
                                    <h1 id="h1_card">Helen Parker<span>design <i>&</i> photography</span></h1>
                                    <ul id="ul_card">
                                        <li id="li_tag">+1-111-111-11-11</li>
                                        <li id="li_tag">my-email@email.com</li>
                                        <li id="li_tag">my-site.com</li>
                                    </ul>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card 3 --}}
                    <div class="col-sm-6">
                        <div class="container" id="container" style="margin-right: 16%; padding-top: 69px;">
                            <div style="padding-top: 33px;">
                                <a onclick="card3()" type="button" style="background-color: #141212;
                                border: none;
                                color: white;
                                padding: 15px 32px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                cursor: pointer;">Demo</a>
                            </div>
                            <div class="card card3" id="card_cards">
                                <div class="front side front3" id="front_card3">
                                    <h1 class="logo" id="logo_card3">Zach Saucier</h1>
                                </div>
                                <div class="back back3" id="back_card">
                                    <h1 id="h2_card">Zach Saucier<span>Designer <i>&</i> Developer</span></h1>
                                    <ul id="ul1_card">
                                        <li id="li1_tag">+91 9586958622</li>
                                        <li id="li1_tag">myemail@email.com</li>
                                        <li id="li1_tag">my-site.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- card 4 --}}
                    <div class="col-sm-6">
                        <div class="container2" id="container2" style="margin-right:31%;padding-top: 69px;">
                            <div style="padding-top: 33px;">
                                <a  onclick="card4()" type="button" style="background-color: #141212;
                                border: none;
                                color: white;
                                padding: 15px 32px;
                                text-align: center;
                                text-decoration: none;
                                display: inline-block;
                                font-size: 16px;
                                margin: 4px 2px;
                                cursor: pointer;">Demo</a>
                        </div>
                            <div class="card card4" id="card_cards">
                                <div class="front front4" id="front_card1">
                                </div>
                                <div class="back back4" id="back_card">
                                    <h1 id="h4_card">Mr. Bromi<span>*************** <i>*</i> ***********</span></h1>
                                    <ul id="ul4_card">
                                        <li id="li4_tag">+1-111-111-11-11</li>
                                        <li id="li4_tag">my-email@email.com</li>
                                        <li id="li4_tag">my-site.com</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
{{-- <script src="{{asset('admins/assets/js/jspdf.umd.min.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> --}}
<script>
function card1() {
    const cardElement = document.querySelector('.card1');
    const frontCardElement = document.querySelector('.front1');
    const backCardElement = document.querySelector('.back1');

    if (backCardElement) {
        // Apply CSS transform to flip the back card
        backCardElement.style.transform = 'scaleX(-1) rotateY(180deg)';
    }

    Promise.all([
        domtoimage.toPng(frontCardElement),
        domtoimage.toPng(backCardElement)
    ])
    .then(function(images) {
        const pdf = new jsPDF();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        const frontImgData = images[0];
        const backImgData = images[1];

        // Define the desired dimensions for the card in the PDF
        const cardWidthInPdf = 100; // Set the desired width of the card in the PDF (e.g., 100 mm)
        const cardHeightInPdf = (cardWidthInPdf * frontCardElement.offsetHeight) / frontCardElement.offsetWidth;

        const spaceBetweenCards = 10; // Set the desired space between the front and back card
        const paddingTop = 5; // Set the desired padding from the top (in mm)

        // Calculate the positions for the front and back card
        const frontCardX = (pdfWidth - cardWidthInPdf) / 2;
        const frontCardY = paddingTop;

        const backCardX = frontCardX;
        const backCardY = frontCardY + cardHeightInPdf + spaceBetweenCards;

        // Add front side to the PDF
        pdf.addImage(frontImgData, 'PNG', frontCardX, frontCardY, cardWidthInPdf, cardHeightInPdf);

        // Add back side to the PDF
        pdf.addImage(backImgData, 'PNG', backCardX, backCardY, cardWidthInPdf, cardHeightInPdf);

        const pdfData = pdf.output('blob');
        const pdfURL = URL.createObjectURL(pdfData);

        // Open PDF in a new tab for previewing
        window.open(pdfURL);
    })
    .catch(function(error) {
        console.error('Error generating PDF:', error);
    })
    .finally(function() {
        // Reset the CSS transform of the back card element
        if (backCardElement) {
            backCardElement.style.transform = '';
        }
    });
}




function card2() {
    const cardElement = document.querySelector('.card2');
    const frontCardElement = document.querySelector('.front2');
    const backCardElement = document.querySelector('.back2');

    if (backCardElement) {
        // Apply CSS transform to flip the back card
        backCardElement.style.transform = 'scaleX(-1) rotateY(180deg)';
    }

    Promise.all([
        domtoimage.toPng(frontCardElement),
        domtoimage.toPng(backCardElement)
    ])
    .then(function(images) {
        const pdf = new jsPDF();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        const frontImgData = images[0];
        const backImgData = images[1];

        // Define the desired dimensions for the card in the PDF
        const cardWidthInPdf = 100; // Set the desired width of the card in the PDF (e.g., 100 mm)
        const cardHeightInPdf = (cardWidthInPdf * frontCardElement.offsetHeight) / frontCardElement.offsetWidth;

        const spaceBetweenCards = 10; // Set the desired space between the front and back card
        const paddingTop = 5; // Set the desired padding from the top (in mm)

        // Calculate the positions for the front and back card
        const frontCardX = (pdfWidth - cardWidthInPdf) / 2;
        const frontCardY = paddingTop;

        const backCardX = frontCardX;
        const backCardY = frontCardY + cardHeightInPdf + spaceBetweenCards;

        // Add front side to the PDF
        pdf.addImage(frontImgData, 'PNG', frontCardX, frontCardY, cardWidthInPdf, cardHeightInPdf);

        // Add back side to the PDF
        pdf.addImage(backImgData, 'PNG', backCardX, backCardY, cardWidthInPdf, cardHeightInPdf);

        const pdfData = pdf.output('blob');
        const pdfURL = URL.createObjectURL(pdfData);

        // Open PDF in a new tab for previewing
        window.open(pdfURL);
    })
    .catch(function(error) {
        console.error('Error generating PDF:', error);
    })
    .finally(function() {
        // Reset the CSS transform of the back card element
        if (backCardElement) {
            backCardElement.style.transform = '';
        }
    });
}





function card3() {
    const cardElement = document.querySelector('.card3');
    const frontCardElement = document.querySelector('.front3');
    const backCardElement = document.querySelector('.back3');

    if (backCardElement) {
        // Apply CSS transform to flip the back card
        backCardElement.style.transform = 'scaleX(-1) rotateY(180deg)';
    }

    Promise.all([
        domtoimage.toPng(frontCardElement),
        domtoimage.toPng(backCardElement)
    ])
    .then(function(images) {
        const pdf = new jsPDF();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        const frontImgData = images[0];
        const backImgData = images[1];

        // Define the desired dimensions for the card in the PDF
        const cardWidthInPdf = 100; // Set the desired width of the card in the PDF (e.g., 100 mm)
        const cardHeightInPdf = (cardWidthInPdf * frontCardElement.offsetHeight) / frontCardElement.offsetWidth;

        const spaceBetweenCards = 10; // Set the desired space between the front and back card
        const paddingTop = 5; // Set the desired padding from the top (in mm)

        // Calculate the positions for the front and back card
        const frontCardX = (pdfWidth - cardWidthInPdf) / 2;
        const frontCardY = paddingTop;

        const backCardX = frontCardX;
        const backCardY = frontCardY + cardHeightInPdf + spaceBetweenCards;

        // Add front side to the PDF
        pdf.addImage(frontImgData, 'PNG', frontCardX, frontCardY, cardWidthInPdf, cardHeightInPdf);

        // Add back side to the PDF
        pdf.addImage(backImgData, 'PNG', backCardX, backCardY, cardWidthInPdf, cardHeightInPdf);

        const pdfData = pdf.output('blob');
        const pdfURL = URL.createObjectURL(pdfData);

        // Open PDF in a new tab for previewing
        window.open(pdfURL);
    })
    .catch(function(error) {
        console.error('Error generating PDF:', error);
    })
    .finally(function() {
        // Reset the CSS transform of the back card element
        if (backCardElement) {
            backCardElement.style.transform = '';
        }
    });
}

function card4() {
    const cardElement = document.querySelector('.card4');
    const frontCardElement = document.querySelector('.front4');
    const backCardElement = document.querySelector('.back4');

    if (backCardElement) {
        // Apply CSS transform to flip the back card
        backCardElement.style.transform = 'scaleX(-1) rotateY(180deg)';
    }

    Promise.all([
        domtoimage.toPng(frontCardElement),
        domtoimage.toPng(backCardElement)
    ])
    .then(function(images) {
        const pdf = new jsPDF();
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        const frontImgData = images[0];
        const backImgData = images[1];

        // Define the desired dimensions for the card in the PDF
        const cardWidthInPdf = 100; // Set the desired width of the card in the PDF (e.g., 100 mm)
        const cardHeightInPdf = (cardWidthInPdf * frontCardElement.offsetHeight) / frontCardElement.offsetWidth;

        const spaceBetweenCards = 10; // Set the desired space between the front and back card
        const paddingTop = 5; // Set the desired padding from the top (in mm)

        // Calculate the positions for the front and back card
        const frontCardX = (pdfWidth - cardWidthInPdf) / 2;
        const frontCardY = paddingTop;

        const backCardX = frontCardX;
        const backCardY = frontCardY + cardHeightInPdf + spaceBetweenCards;

        // Add front side to the PDF
        pdf.addImage(frontImgData, 'PNG', frontCardX, frontCardY, cardWidthInPdf, cardHeightInPdf);

        // Add back side to the PDF
        pdf.addImage(backImgData, 'PNG', backCardX, backCardY, cardWidthInPdf, cardHeightInPdf);

        const pdfData = pdf.output('blob');
        const pdfURL = URL.createObjectURL(pdfData);

        // Open PDF in a new tab for previewing
        window.open(pdfURL);
    })
    .catch(function(error) {
        console.error('Error generating PDF:', error);
    })
    .finally(function() {
        // Reset the CSS transform of the back card element
        if (backCardElement) {
            backCardElement.style.transform = '';
        }
    });
}




// function card2() {
//     const cardElement = document.querySelector('.card2');
//     const frontCardElement = document.querySelector('.front2');
//     const backCardElement = document.querySelector('.back2');

//     if (backCardElement) {
//         // Apply CSS transform to flip the back card
//         backCardElement.style.transform = 'scaleX(-1) rotateY(180deg)';
//     }

//     Promise.all([
//         domtoimage.toPng(frontCardElement),
//         domtoimage.toPng(backCardElement)
//     ])
//     .then(function(images) {
//         const pdf = new jsPDF();
//         const pdfWidth = pdf.internal.pageSize.getWidth();
//         const pdfHeight = pdf.internal.pageSize.getHeight();

//         const frontImgData = images[0];
//         const backImgData = images[1];

//         // Define the desired dimensions for the card in the PDF
//         const cardWidthInPdf = 100; // Set the desired width of the card in the PDF (e.g., 100 mm)
//         const cardHeightInPdf = (cardWidthInPdf * frontCardElement.offsetHeight) / frontCardElement.offsetWidth;

//         const spaceBetweenCards = 10; // Set the desired space between the front and back card
//         const paddingTop = 5; // Set the desired padding from the top (in mm)

//         // Calculate the positions for the front and back card
//         const frontCardX = (pdfWidth - cardWidthInPdf) / 2;
//         const frontCardY = paddingTop;

//         const backCardX = frontCardX;
//         const backCardY = frontCardY + cardHeightInPdf + spaceBetweenCards;

//         // Add front side to the PDF
//         pdf.addImage(frontImgData, 'PNG', frontCardX, frontCardY, cardWidthInPdf, cardHeightInPdf);

//         // Add back side to the PDF
//         pdf.addImage(backImgData, 'PNG', backCardX, backCardY, cardWidthInPdf, cardHeightInPdf);

//         const pdfData = pdf.output('blob');
//         const pdfURL = URL.createObjectURL(pdfData);

//         // Open PDF in a new tab for previewing
//         window.open(pdfURL);
//     })
//     .catch(function(error) {
//         console.error('Error generating PDF:', error);
//     })
//     .finally(function() {
//         // Reset the CSS transform of the back card element
//         if (backCardElement) {
//             backCardElement.style.transform = '';
//         }
//     });
// }


</script>
{{-- <script>
    function card1() {
            const cardElement = document.querySelector('.card1');
            const frontCardElement = document.querySelector('.front1');
            const backCardElement = document.querySelector('.back1');

        if (backCardElement) {
            // Reset the CSS transform
            backCardElement.style.transform = '';
        }

        Promise.all([
            html2canvas(frontCardElement),
            html2canvas(backCardElement)
        ])
        .then(function (canvases) {
            const pdf = new jsPDF();

            canvases.forEach(function (canvas) {
                const imgData = canvas.toDataURL('image/png');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.addPage();
            });

            pdf.deletePage(pdf.internal.getNumberOfPages());

            pdf.save('business_card.pdf');
        })
        .catch(function (error) {
            console.error('Error generating PDF:', error);
        });
    }
</script> --}}
    {{-- <script>
        function card1() {
            const cardElement = document.querySelector('.card1');
            const frontCardElement = document.querySelector('.front1');
            const backCardElement = document.querySelector('.back1');

            // const cardElement = document.querySelector('.card');
            // const frontCardElement = cardElement.querySelector('.card-front');
            // const backCardElement = cardElement.querySelector('.card-back');

            if (backCardElement) {
                Promise.all([
                    html2canvas(frontCardElement),
                    html2canvas(backCardElement)
                ])
                .then(function (canvases) {
                    const pdf = new jsPDF();

                    canvases.forEach(function (canvas) {
                        const imgData = canvas.toDataURL('image/png');
                        const imgProps = pdf.getImageProperties(imgData);
                        const pdfWidth = pdf.internal.pageSize.getWidth();
                        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                        pdf.addPage();
                    });

                    pdf.deletePage(pdf.internal.getNumberOfPages());

                    pdf.save('business_card.pdf');
                })
                .catch(function (error) {
                    console.error('Error generating PDF:', error);
                });
            } else {
                console.error('Back side element not found.');
            }
        }
    </script> --}}
{{-- <script>
function card1() {
    const cardElement = document.querySelector('.card1');

    html2canvas(cardElement)
        .then(function (canvas) {
            const pdf = new jsPDF();
            const imageData = canvas.toDataURL('image/png');
            const imgWidth = pdf.internal.pageSize.getWidth();
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            const positionX = 0;
            const positionY = (pdf.internal.pageSize.getHeight() - imgHeight) / 2;
            pdf.addImage(imageData, 'PNG', positionX, positionY, imgWidth, imgHeight);
            const pdfUrl = pdf.output('dataurlstring');
            const previewWindow = window.open();
            previewWindow.document.open();
            previewWindow.document.write('<html><head><title>Visiting Card Preview</title></head><body>');
            previewWindow.document.write('<embed type="application/pdf" src="' + pdfUrl + '" style="width:100%; height:100vh;" />');
            previewWindow.document.write('</body></html>');
            previewWindow.document.close();
        })
        .catch(function (error) {
            console.error('Error generating PDF:', error);
        });
}
</script> --}}

@endpush
