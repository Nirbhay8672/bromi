<html >
  <head>
    <meta charset="UTF-8">
    <title>Business Card ~ Alex K</title>
    
    	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Lato:300,400'>
		<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style.css">
    
  </head>
    <style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  height: 100vh;
  width: 100vw;
  background: url('https://unsplash.it/2000/2000?image=684&blur') no-repeat center center / cover;
  font-family: 'Lato', sans-serif;
  font-weight: 300;
  font-size: 16px;
}
img{
  max-width: 100%;
}

label{
  display: inline-block;
  background-color: rgb(42,169,224);
  padding: 10px 20px;
  margin: 20px;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  -webkit-transition: all .3s;
          transition: all .3s;
}
label:hover{
  box-shadow: 5px 5px 10px rgba(0,0,0, .1);
  background-color: rgb(32,159,214);
}
input{
  display: none;
}

.profile-card{
  position: absolute;
  left:0;top:0;right:0;bottom:0;
  margin: auto;
  width: 400px;
  height: 250px;
  background-color: rgba(45,45,45, 0);
  color: rgb(255,255,255);
  font-smoothing: antialiased;
  -webkit-perspective: 100%;
          perspective: 100%;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-transform: rotateX(55deg) rotateY(9deg) rotateZ(-40deg);
          transform: rotateX(55deg) rotateY(9deg) rotateZ(-40deg);
  -webkit-transition: all .5s ease-in;
          transition: all .5s ease-in;
}
/*
*:checked + .profile-card{
  -webkit-transform: rotate(0);
      -ms-transform: rotate(0);
          transform: rotate(0);
  box-shadow: 0 0 20px rgba(0,0,0, .4);
}*/
.profile-card header{
  position: absolute;
  right: 0;
  top: 0;
  width: 300px;
  height: 250px;
  background-color: rgb(45,45,45);
  text-align: right;
  z-index: -1;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
.profile-card header:before,
.profile-card header:after{
  position: absolute;
  bottom: 1px;
  display: block;
  content: '';
  height: 10px;
  width: 100%;
  background-color: rgb(35,35,35);
  -webkit-transform: rotateX(90deg);
          transform: rotateX(90deg);
  -webkit-transform-origin: 0 100% 0;
      -ms-transform-origin: 0 100% 0;
          transform-origin: 0 100% 0;
}
.profile-card header:after{
  height: 100%;
  width: 10px;
  -webkit-transform: rotateY(90deg);
          transform: rotateY(90deg);
}
.profile-card header>a{
  display: block;
  background-color: rgba(0,0,0, .2);
  width: 100%;
  height: 83.333px;
}
.profile-card header>a>img{
  margin: 10px;
  height: 63.333px;
  width: 63.333px;
}
.profile-card  h1{
  padding: 10px 20px 0;
  font-size: 32px;
  font-weight: 300;
}
.profile-card h2{
  font-size: 19px;
  font-weight: 300;
  text-transform: uppercase;
  color: rgba(255,255,255, .5);
  padding: 0 20px;  
}
.profile-card .profile-bio{
  margin: 156.666px 0 0 100px;
  padding: 10px 20px;
  text-align: right;
}
.profile-card .profile-social-links{
  position: absolute;
  top: 0;
  left: 0;
  width: 100px;
  height: 100%;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
}
.profile-card .profile-social-links li{
  display: block;
  height: 33.4%;
  width: 100%;
  list-style: none;
  background-color: rgb(130,181,64);
  position: relative;
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d;
  -webkit-transform: translateZ(1px);
          transform: translateZ(1px);
  -webkit-transition: all .4s;
          transition: all .4s;
}
.profile-card .profile-social-links li:before,
.profile-card .profile-social-links li:after{
  position: absolute;
  display: block;
  content: '';
  height: 100%;
  width: 10px;
  background-color: rgb(120,171,54);
  -webkit-transform: rotateY(90deg);
          transform: rotateY(90deg);
  -webkit-transform-origin: 0 0;
      -ms-transform-origin: 0 0;
          transform-origin: 0 0;
}
.profile-card .profile-social-links li:after{
  height: 10px;
  width: 100%;
  -webkit-transform: rotateX(-90deg);
          transform: rotateX(-90deg);
}
.profile-card .profile-social-links li:hover{
  -webkit-transform: translateZ(9px);
          transform: translateZ(9px);
}
.profile-card .profile-social-links li:first-child{
  background-color: rgb(42,169,224);
}
.profile-card .profile-social-links li:first-child:before,
.profile-card .profile-social-links li:first-child:after{
  background-color: rgb(32,159,214);
}
.profile-card .profile-social-links li:last-child{
  background-color: rgb(243,122,41);
}
.profile-card .profile-social-links li:last-child:before,
.profile-card .profile-social-links li:last-child:after{
  background-color: rgb(233,112,31);
}
.profile-card .profile-social-links li a{
  display: block;
  height: 100%;
  width: 100%;
  padding: 20px;
  text-align: center;
  -webkit-transition: all .3s;
          transition: all .3s;
  font-size: 40px;
  line-height: 45px;
  text-decoration: none;
  color: rgb(45,45,45);
}
.profile-card .profile-social-links li:hover a{
  -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
          transform: scale(1.1);
}
    </style>
  <body>

	<aside class="profile-card">
	  
	  <header>

	    <a href="//codepen.io/alexk/"target="_blank">
	      <img src="https://pbs.twimg.com/profile_images/684631763730092033/6rFuyjkf.jpg">
	    </a>

	    <h1>Alex K.</h1>
	    
	    <h2>Dev | Design | Secure</h2>
	    
	  </header>
	  
	  <div class="profile-bio">
	    
	    <p>HTML, CSS, Python, PHP, VB.NET, some C++, Java.</p>
      <p>Design with: Photoshop, Cinema 4D, Maya.
      </p>
	    
	  </div>
	  
	  <ul class="profile-social-links">
	    
	    <li>
	      <a href="//twitter.com/AKDesigned" class="fa fa-twitter" title="my twitter page"target="_blank"></a>
	    </li>
	    
	    <li>
	      <a href="//github.com/Leak-sx" class="fa fa-github" title="my github profile"target="_blank"></a>
	    </li>
	    
	    <li>
	      <a href="//codepen.io/alexk/" class="fa fa-codepen" title="the code base" target="_blank"></a>
	    </li>
	    
	  </ul>
	  
	</aside>
  </body>
</html>