<style>

// Business Card
.business-card {
  position: absolute;
  top: 0; left: 0;
  right: 0; bottom: 0;
  margin: auto;
  height: 500px/2;
  width: 500px;
  
  background: $#f12e50;
  border-radius: 30px;
  
  &:before,
  &:after {
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0; right: 0;
  }
  &:before {
    background: #ee0c4b;
    border-top-right-radius: 30px;
    clip-path: polygon(20% 0, 100% 0, 100% 30%, 40% 70%);
  }
  &:after {
    background: #c80e3d;
    border-bottom-right-radius: 30px;
    clip-path: polygon(40% 70%, 100% 30%, 100% 100%, 48.5% 100%);
  }
}
  div {
    z-index: 2;
  }
  .bc__logo {
    position: absolute;
    top: 10%; right: 10%;
    
    figure {
      position: relative;
      display: inline-block;
      height: 4em; width: calc(4em * 0.57735);
      border-radius: .5em/.25em;
      background: white;
      transform: rotate(90deg);
    }
    figure:before, figure:after {
      position: absolute;
      width: inherit; height: inherit;
      border-radius: inherit;
      background: inherit;
      content: '';
    }
    figure:before {
      transform: rotate(60deg);
    }
    figure:after {
      transform: rotate(-60deg);
    }
      i {
        position: absolute;
        top: 0; bottom: 0;
        left: 0; right: 0;
        margin: auto;
        height: 25%;
        width: 70%;
        background: #ee0c4b;
        transform:
          skew(-30deg)
          rotate(-90deg);
        z-index: 2;
        
        &:before,
        &:after {
          content: '';
          position: absolute;
          width: 60%;
          height: 75%;
          background: inherit;
          z-index: 5;
        }
        
        &:before {
          top: -82%;
          right: 24%;
          transform:
            skew(-40deg)
            rotate(90deg);
        }
        &:after {
          bottom: -85%;
          right: 23%;
          transform:
            skew(-40deg)
            rotate(90deg);
        }
      }
    h2 {
      display: inline-block;
      padding-left: .65em;
      color: white;
      font-size: 2em;
      font-weight: 900;
      letter-spacing: -1px;
      line-height: 2;
      vertical-align: top;
    }
  }

  .bc__tagline {
    position: absolute;
    bottom: 10%; right: 5%;
    color: white;
    line-height: 1.4;
    text-align: right;
    
    em {
      font-weight: 600;
      font-style: italic;
    }
  }

// Stage Styles
body {
  background: #111;
  font: 400 .875em 'Helvetica Neue', 'Roboto Sans', Helvetica, Arial, Sans-serif;
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

.credit {
  position: absolute;
  bottom: 15%;
  width: 100%;
  color: white;
  text-align: center;
  
  a {
    color: #ea4c89;
    text-decoration: none;
  }
}
</style>

<div class='business-card'>
    <div class='bc__logo'>
      <figure><i></i></figure>
      <h2>Slant Studio</h2>
    </div>
    <div class='bc__tagline'>
      <p>Putting a <em>slant</em> on your<br>Web Design &amp; Branding Projects</p>
    </div>
</div>
  <p class='credit'>
    Based on <a href="http://drbl.in/naLd" target="_blank">this dribbble shot</a> by <a href="https://dribbble.com/slant" target="_blank">Marc Bowers</a>
  </p>