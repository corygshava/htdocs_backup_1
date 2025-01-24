
/* HTML: <div class="loader"></div> */

let loaders = [
	`.loader {
		width: calc(80px / cos(45deg));
		height: 14px;
		background: repeating-linear-gradient(-45deg,#000 0 15px,#0000 0 20px) left/200% 100%;
		animation: l3 2s infinite linear;
	}
	@keyframes l3 {
	    100% {background-position:right}
	}`,

	`.loader {
	  width: 60px;
	  aspect-ratio: 1;
	  --g: conic-gradient(from -90deg at 10px 10px,#fff 90deg,#0000 0);
	  background: var(--g), var(--g), var(--g);
	  background-size: 50% 50%;
	  animation: l18 1s infinite;
	}
	@keyframes l18 {
	   0%   {background-position:0     0, 10px 10px, 20px 20px}
	   33%  {background-position:-30px 0, 10px 10px, 20px 20px}
	   66%  {background-position:-30px 0, 10px 40px, 20px 20px}
	   100% {background-position:-30px 0, 10px 40px, 50px 20px}
	}`,

	`.loader {
	  width: 120px;
	  height: 20px;
	  background: 
	    linear-gradient(#000 50%,#0000 0),
	    linear-gradient(#0000 50%,#000 0),
	    linear-gradient(#000 50%,#0000 0),
	    linear-gradient(#0000 50%,#000 0),
	    linear-gradient(#000 50%,#0000 0),
	    linear-gradient(#0000 50%,#000 0)
	    #ddd;
	  background-size: calc(100%/6 + 1px) 200%;
	  background-repeat: no-repeat;
	  animation: l12 2s infinite;
	}
	@keyframes l12 {
	  0%     {background-position: calc(0*100%/5) 100%,calc(1*100%/5)   0%,calc(2*100%/5) 100%,calc(3*100%/5)   0%,calc(4*100%/5) 100%,calc(5*100%/5)   0%}
	  16.67% {background-position: calc(0*100%/5)   0%,calc(1*100%/5)   0%,calc(2*100%/5) 100%,calc(3*100%/5)   0%,calc(4*100%/5) 100%,calc(5*100%/5)   0%}
	  33.33% {background-position: calc(0*100%/5)   0%,calc(1*100%/5) 100%,calc(2*100%/5) 100%,calc(3*100%/5)   0%,calc(4*100%/5) 100%,calc(5*100%/5)   0%}
	  50%    {background-position: calc(0*100%/5)   0%,calc(1*100%/5) 100%,calc(2*100%/5)   0%,calc(3*100%/5)   0%,calc(4*100%/5) 100%,calc(5*100%/5)   0%}
	  66.67% {background-position: calc(0*100%/5)   0%,calc(1*100%/5) 100%,calc(2*100%/5)   0%,calc(3*100%/5) 100%,calc(4*100%/5) 100%,calc(5*100%/5)   0%}
	  83.33% {background-position: calc(0*100%/5)   0%,calc(1*100%/5) 100%,calc(2*100%/5)   0%,calc(3*100%/5) 100%,calc(4*100%/5)   0%,calc(5*100%/5)   0%}
	  100%   {background-position: calc(0*100%/5)   0%,calc(1*100%/5) 100%,calc(2*100%/5)   0%,calc(3*100%/5) 100%,calc(4*100%/5)   0%,calc(5*100%/5) 100%}
	}`,

	`.loader {
	  width: 80px;
	  aspect-ratio: 1.154;
	  clip-path: polygon(50% 0,100% 100%,0 100%);
	  --c:no-repeat linear-gradient(#f03355 0 0);
	  background: var(--c),var(--c),var(--c),var(--c),var(--c);
	  background-size: 100% calc(100%/5 + 1px);
	  animation: l15 2s infinite;
	}
	@keyframes l15 {
	  0%  {background-position: 0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4)}
	  20% {background-position: 0 calc(4*100%/4) ,0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4)}
	  40% {background-position: 0 calc(4*100%/4) ,0 calc(3*100%/4) ,0 calc(-2*100%/4),0 calc(-2*100%/4),0 calc(-2*100%/4)}
	  60% {background-position: 0 calc(4*100%/4) ,0 calc(3*100%/4) ,0 calc(2*100%/4) ,0 calc(-2*100%/4),0 calc(-2*100%/4)}
	  80% {background-position: 0 calc(4*100%/4) ,0 calc(3*100%/4) ,0 calc(2*100%/4) ,0 calc(1*100%/4) ,0 calc(-2*100%/4)}
	  100%{background-position: 0 calc(4*100%/4) ,0 calc(3*100%/4) ,0 calc(2*100%/4) ,0 calc(1*100%/4) ,0 calc(0*100%/4)}
	}`,
	`.loader {
	  height: 4px;
	  width: 130px;
	  --c:no-repeat linear-gradient(#6100ee 0 0);
	  background: var(--c),var(--c),#d7b8fc;
	  background-size: 60% 100%;
	  animation: l16 3s infinite;
	}
	@keyframes l16 {
	  0%   {background-position:-150% 0,-150% 0}
	  66%  {background-position: 250% 0,-150% 0}
	  100% {background-position: 250% 0, 250% 0}
	}`,

	`.loader {
	  width: 60px;
	  aspect-ratio: 1;
	  border: 15px solid #ddd;
	  border-radius: 50%;
	  position: relative;
	  transform: rotate(45deg);
	}
	.loader::before {
	  content: "";
	  position: absolute;
	  inset: -15px;
	  border-radius: 50%;
	  border: 15px solid #514b82;
	  animation: l18 2s infinite linear;
	}
	@keyframes l18 {
	    0%   {clip-path:polygon(50% 50%,0 0,0    0,0    0   ,0    0   ,0    0   )}
	    25%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 0   ,100% 0   ,100% 0   )}
	    50%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,100% 100%,100% 100%)}
	    75%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0    100%,0    100%)}
	    100% {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0    100%,0    0   )}
	}`,

	`.loader {
	  width: 120px;
	  height: 20px;
	  background:
	   linear-gradient(#000 0 0) 0/0% no-repeat
	   #ddd;
	  animation: l1 2s infinite linear;
	}
	@keyframes l1 {
	    100% {background-size:100%}
	}`,
	`.loader {
	  width: 45px;
	  aspect-ratio: 1;
	  --c: no-repeat linear-gradient(#000 calc(50% - 10px),#0000 0 calc(50% + 10px),#000 0);
	  background: 
	    var(--c) 0%   100%,
	    var(--c) 50%  100%,
	    var(--c) 100% 100%;
	  background-size: 20% calc(200% + 20px);
	  animation:l4 1s infinite linear;
	}
	@keyframes l4 {
	    33%  {background-position: 0% 50%,50% 100%,100% 100%}
	    50%  {background-position: 0%  0%,50%  50%,100% 100%}
	    66%  {background-position: 0%  0%,50%   0%,100%  50%}
	    100% {background-position: 0%  0%,50%   0%,100%   0%}
	}`,

	`.loader {
	  width: 45px;
	  aspect-ratio: 1;
	  --c:no-repeat linear-gradient(#000 0 0);
	  background: var(--c), var(--c), var(--c), var(--c), var(--c), var(--c);
	  animation: 
	    l14-1 .5s infinite alternate,
	    l14-2  2s infinite;
	}
	@keyframes l14-1 {
	 0%,10% {background-size:20% 100%}
	 100%   {background-size:20% 20%}
	}
	@keyframes l14-2 {
	 0%,49.9% {background-position: 0 0  ,0 100%,50% 50%,50% 50% ,100% 0  ,100% 100%}
	 50%,100% {background-position: 0 50%,0  50%,50% 0  ,50% 100%,100% 50%,100% 50% }
	}`,

	`.loader {
	  width: 40px;
	  height: 20px;
	  --c:no-repeat radial-gradient(farthest-side,#000 93%,#0000);
	  background:
	    var(--c) 0    0,
	    var(--c) 50%  0;
	  background-size: 8px 8px;
	  position: relative;
	  clip-path: inset(-200% -100% 0 0);
	  animation: l6-0 1.5s linear infinite;
	}
	.loader:before {
	  content: "";
	  position: absolute;
	  width: 8px;
	  height: 12px;
	  background: #000;
	  left: -16px;
	  top: 0;
	  animation: 
	    l6-1 1.5s linear infinite,
	    l6-2 0.5s cubic-bezier(0,200,.8,200) infinite;
	}
	.loader:after {
	  content: "";
	  position: absolute;
	  inset: 0 0 auto auto;
	  width: 8px;
	  height: 8px;
	  border-radius: 50%;
	  background: #000; 
	  animation: l6-3 1.5s linear infinite;
	}
	@keyframes l6-0 {
	  0%,30%  {background-position: 0  0   ,50% 0   }
	  33%     {background-position: 0  100%,50% 0   }
	  41%,63% {background-position: 0  0   ,50% 0   }
	  66%     {background-position: 0  0   ,50% 100%}
	  74%,100%{background-position: 0  0   ,50% 0   }
	}
	@keyframes l6-1 {
	  90%  {transform:translateY(0)}
	  95%  {transform:translateY(15px)}
	  100% {transform:translateY(15px);left:calc(100% - 8px)}
	}
	@keyframes l6-2 {
	  100% {top:-0.1px}
	}
	@keyframes l6-3 {
	  0%,80%,100% {transform:translate(0)}
	  90%         {transform:translate(26px)}
	}`,

	`.loader{
	  width: 40px;
	  aspect-ratio: 1;
	  --c:no-repeat linear-gradient(#000 0 0);
	  background: 
	    var(--c) 0    0,
	    var(--c) 0    100%, 
	    var(--c) 50%  0,  
	    var(--c) 50%  100%, 
	    var(--c) 100% 0, 
	    var(--c) 100% 100%;
	  background-size: 8px 50%;
	  animation: l7-0 1s infinite;
	  position: relative;
	  overflow: hidden;
	}
	.loader:before {
	  content: "";
	  position: absolute;
	  width: 8px;
	  height: 8px;
	  border-radius: 50%;
	  background: #000;
	  top: calc(50% - 4px);
	  left: -8px;
	  animation: inherit;
	  animation-name: l7-1;
	}

	@keyframes l7-0 {
	 16.67% {background-size:8px 30%, 8px 30%, 8px 50%, 8px 50%, 8px 50%, 8px 50%}
	 33.33% {background-size:8px 30%, 8px 30%, 8px 30%, 8px 30%, 8px 50%, 8px 50%}
	 50%    {background-size:8px 30%, 8px 30%, 8px 30%, 8px 30%, 8px 30%, 8px 30%}
	 66.67% {background-size:8px 50%, 8px 50%, 8px 30%, 8px 30%, 8px 30%, 8px 30%}
	 83.33% {background-size:8px 50%, 8px 50%, 8px 50%, 8px 50%, 8px 30%, 8px 30%}
	}

	@keyframes l7-1 {
	 20%  {left:0px}
	 40%  {left:calc(50%  - 4px)}
	 60%  {left:calc(100% - 8px)}
	 80%,
	 100% {left:100%}
	}`,

	`.loader {
	  width: 40px;
	  aspect-ratio: 1;
	   --c: linear-gradient(#000 0 0);
	   --m: radial-gradient(farthest-side,#000 90%,#0000);
	  background: var(--c),var(--m),var(--c);
	  background-size:16px 8px,10px 10px; 
	  background-repeat: no-repeat;
	  animation: 
	    l19-1 .5s infinite alternate,
	    l19-2  4s infinite linear .5s;
	}
	@keyframes l19-1 {
	  0%,10%   {background-position: calc(50% - 8px) 50%,50% 10%,calc(50% + 8px)   50%}
	  80%,100% {background-position: -20px           50%,50% 50%,calc(100% + 20px) 50%}
	}
	@keyframes l19-2 {
	  0% ,24.99% {transform: rotate(0)}
	  25%,49.99% {transform: rotate(90deg)}
	  50%,74.99% {transform: rotate(180deg)}
	  75%,100%   {transform: rotate(270deg)}
	}`,

	`.loader {
	  width: 60px;
	  aspect-ratio: 1;
	  background:
	    linear-gradient(#f77825 0 0),
	    linear-gradient(#f77825 0 0),
	    linear-gradient(#f77825 0 0),
	    linear-gradient(#f77825 0 0),
	    linear-gradient(#60B99A 0 0),
	    linear-gradient(#60B99A 0 0),
	    linear-gradient(#554236 0 0),
	    linear-gradient(#554236 0 0);
	  background-size: 25% 25%,25% 25%,25% 25%,25% 25%,25% 50%,25% 50%,50% 25%,50% 25%;
	  background-repeat: no-repeat;
	  animation: l20 1.5s infinite alternate;
	}
	@keyframes l20 {
	  0%,
	  10%  {background-position: 
	            calc(1*100%/3) calc(1*100%/3),calc(2*100%/3) calc(1*100%/3),calc(1*100%/3) calc(2*100%/3),calc(2*100%/3) calc(2*100%/3),
	            calc(1*100%/3) 50%,calc(2*100%/3) 50%,50% calc(1*100%/3),50% calc(2*100%/3)}
	  33%  {background-position: 
	            calc(0*100%/3) calc(0*100%/3),calc(3*100%/3) calc(0*100%/3),calc(0*100%/3) calc(3*100%/3),calc(3*100%/3) calc(3*100%/3),
	            calc(1*100%/3) 50%,calc(2*100%/3) 50%,50% calc(1*100%/3),50% calc(2*100%/3)}
	  66%  {background-position: 
	            calc(0*100%/3) calc(0*100%/3),calc(3*100%/3) calc(0*100%/3),calc(0*100%/3) calc(3*100%/3),calc(3*100%/3) calc(3*100%/3),
	            calc(0*100%/3) 50%,calc(3*100%/3) 50%,50% calc(1*100%/3),50% calc(2*100%/3)}
	  90%,
	  100%  {background-position: 
	            calc(0*100%/3) calc(0*100%/3),calc(3*100%/3) calc(0*100%/3),calc(0*100%/3) calc(3*100%/3),calc(3*100%/3) calc(3*100%/3),
	            calc(0*100%/3) 50%,calc(3*100%/3) 50%,50% calc(0*100%/3),50% calc(3*100%/3)}
	}`,
	`.loader {
	  width: 120px;
	  height: 60px;
	  padding: 10px;
	  box-sizing: border-box;
	  display: flex;
	  justify-content: space-between;
	  background: #fff;
	  filter: blur(5px) contrast(10) hue-rotate(60deg);
	  mix-blend-mode: darken;
	}
	.loader:before,
	.loader:after {
	  content: "";
	  width: 40px;
	  border-radius: 50%;
	  background: #ff00ff;
	  animation: l3 1s infinite alternate;
	}
	.loader:after {
	  --s:-1;
	}
	@keyframes l3{
	  90%,100% {transform: translate(calc(var(--s,1)*30px))}
	}`,
	`.loader {
	  width: 80px;
	  aspect-ratio: 1;
	  border: 10px solid #0000;
	  box-sizing: border-box;
	  background: 
	    radial-gradient(farthest-side,#fff 98%,#0000) 0    0/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) 100% 0/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) 100% 100%/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) 0 100%/20px 20px,
	    linear-gradient(#fff 0 0) 50%/40px 40px,
	    #000;
	  background-repeat:no-repeat;
	  filter: blur(4px) contrast(10);
	  animation: l12 0.8s infinite;
	}
	@keyframes l12 {
	  100%  {background-position:100% 0,100% 100%,0 100%,0 0,center}
	}`,

	`.loader {
	  height: 50px;
	  aspect-ratio: 2;
	  border: 10px solid #000;
	  box-sizing: border-box;
	  background: 
	    radial-gradient(farthest-side,#fff 98%,#0000) left/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) left/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) center/20px 20px,
	    radial-gradient(farthest-side,#fff 98%,#0000) right/20px 20px,
	    #000;
	  background-repeat: no-repeat;
	  filter: blur(4px) contrast(10);
	  animation: l14 1s infinite;
	}
	@keyframes l14 {
	  100%  {background-position:right,left,center,right}
	}`,

	`.loader {
	  width: 80px;
	  aspect-ratio: 1;
	  border: 10px solid #000;
	  box-sizing: border-box;
	  background: 
	    radial-gradient(farthest-side,#fff 98%,#0000) top,
	    radial-gradient(farthest-side,#fff 98%,#0000) top,
	    radial-gradient(farthest-side,#fff 98%,#0000) left,
	    radial-gradient(farthest-side,#fff 98%,#0000) right,
	    radial-gradient(farthest-side,#fff 98%,#0000) bottom,
	    #000;
	  background-size: 20px 20px;
	  background-repeat: no-repeat;
	  filter: blur(4px) contrast(10); 
	  animation: l19 2s infinite;
	}
	@keyframes l19 {
	  0%   {background-position:top,top,left,right,bottom}
	  25%  {background-position:right,top,left,right,bottom}
	  50%  {background-position:bottom,top,left,right,bottom}
	  75%  {background-position:left,top,left,right,bottom}
	  100% {background-position:top,top,left,right,bottom}
	}`,

	`.loader {
	  width: 70px;
	  aspect-ratio: 2;
	  background:
	    radial-gradient(farthest-side,#000 90%,#0000) 0 0/8px 8px,
	    linear-gradient(#fff 0 0) 100% 0/30px 10px,
	    linear-gradient(#fff 0 0) 0 100%/30px 10px,
	    repeating-linear-gradient(90deg,#fff 0 10px,#0000 0 30px);
	  background-repeat: no-repeat;
	  animation: l6 2s infinite;
	}
	@keyframes l6 {
	  0%    {background-position:left 1px bottom 1px,100% 0,0 100%,0 0}
	  12.5% {background-position:left 50% bottom 1px,100% 0,0 100%,0 0}
	  25%   {background-position:left 50% top 1px,100% 0,0 100%,0 0}
	  37.5% {background-position:right 1px top 1px,100% 0,0 100%,0 0}
	  50%   {background-position:right 1px bottom 1px,0 0,100% 100%,0 0}
	  62.5% {background-position:right 50% bottom 1px,0 0,100% 100%,0 0}
	  75%   {background-position:right 50% top 1px,0 0,100% 100%,0 0}
	  87.5% {background-position:left 1px top 1px,0 0,100% 100%,0 0}
	  100%  {background-position:left 1px bottom 1px,100% 0,0 100%,0 0}
	}`,

	`.loader {
	  width: 40px;
	  aspect-ratio: 1;
	  background:
	    radial-gradient(farthest-side,#000 90%,#0000) 50%/8px 8px no-repeat,
	    conic-gradient(from -90deg at 15px 15px,#0000 90deg,#fff 0) 0 0/25px 25px;
	  animation: l7 1s infinite;
	}
	@keyframes l7 {
	  0%   {background-position:50%,0 0}
	  50%  {background-position:50%,25px 0}
	  100% {background-position:50%,25px 25px}
	}`,

	`.loader {
	  width: 90px;
	  height: 14px;
	  box-shadow: 0 3px 0 #fff;
	  background: linear-gradient(#fff 0 0) 50%/2px 100% no-repeat;
	  display: grid;
	}
	.loader:before,
	.loader:after{
	  content: "";
	  grid-area: 1/1;
	  background: radial-gradient(circle closest-side, var(--c,#fff) 92%,#0000 ) 0 0/calc(100%/4) 100%;
	  clip-path: inset(0 50% 0 0);
	  animation: l3 1s infinite linear;
	}
	.loader:after{
	  --c: red; 
	  clip-path: inset(0 0 0 50%);
	}
	@keyframes l3 {
	    100% {background-position: calc(100%/3) 0}
	}`,

	`.loader {
	  width: 90px;
	  height: 14px;
	  box-shadow: 0 3px 0 #fff;
	  background: linear-gradient(#fff 0 0) center/2px 100% no-repeat;
	  display: grid;
	}
	.loader:before,
	.loader:after{
	  content: "";
	  grid-area: 1/1;
	  background: repeating-linear-gradient(90deg,#fff 0 14px,#0000 0 100%) 0 0/calc(100%/4) 100%;
	  clip-path: inset(0 50% 0 0);
	  animation: l2 1s infinite linear;
	}
	.loader:before{
	  background: radial-gradient(circle 7px at 7px 50%,#fff 92%,#0000) 0 0/calc(100%/4) 100%;
	  clip-path: inset(0 0 0 50%);
	}
	@keyframes l2 {
	    100% {background-position: calc(100%/3) 0}
	}`,
	`.loader {
	  position: relative;
	  width: 100px;
	  height: 100px;
	}

	.loader:before , .loader:after{
	  content: '';
	  border-radius: 50%;
	  position: absolute;
	  inset: 0;
	  box-shadow: 0 0 10px 2px rgba(0, 0, 0, 0.3) inset;
	}
	.loader:after {
	  box-shadow: 0 2px 0 #FF3D00 inset;
	  animation: rotate 2s linear infinite;
	}

	@keyframes rotate {
	  0% {  transform: rotate(0)}
	  100% { transform: rotate(360deg)}
	}`,
	`.loader {
	  width: 24px;
	  height: 24px;
	  display: inline-block;
	  position: relative;
	  background: #FFF;
	  box-sizing: border-box;
	  animation: animloader 2s linear infinite;
	}

	@keyframes animloader {
	  0% {
	    transform: translate(0, 0) rotateX(0) rotateY(0);
	  }
	  25% {
	    transform: translate(100%, 0) rotateX(0) rotateY(180deg);
	  }
	  50% {
	    transform: translate(100%, 100%) rotateX(-180deg) rotateY(180deg);
	  }
	  75% {
	    transform: translate(0, 100%) rotateX(-180deg) rotateY(360deg);
	  }
	  100% {
	    transform: translate(0, 0) rotateX(0) rotateY(360deg);
	  }
	}`,
	`.loader{
	    display: block;
	    position: relative;
	    height: 32px;
	    width: 200px;
	    background: #fff;
	    border:2px solid #fff;
	    color: red;
	    overflow: hidden;
	  }
	  .loader::before{
	    content: '';
	    background: red;
	    position: absolute;
	    left: 0;
	    top: 0;
	    width: 0;
	    height: 100%;
	    animation: loading 10s linear infinite;
	  }
	  .loader:after{
	    content: '';
	    position: absolute;
	    left: 0;
	    top: 0;
	    width: 100%;
	    height: 100%;
	    text-align: center;
	    font-size: 24px;
	    line-height: 32px;
	    color: rgb(0,255,255);
	    mix-blend-mode: difference;
	    animation: percentage 10s linear infinite;
	  }
	  
	  @keyframes loading {
	    0% { width: 0 }
	    100% { width: 100% }
	  }
	  @keyframes percentage {
	    0% { content: "0%"}
	    5% { content: "5%"}
	    10% { content: "10%"}
	    20% { content: "20%"}
	    30% { content: "30%"}
	    40% { content: "40%"}
	    50% { content: "50%"}
	    60% { content: "60%"}
	    70% { content: "70%"}
	    80% { content: "80%"}
	    90% { content: "90%"}
	    95% { content: "95%"}
	    96% { content: "96%"}
	    97% { content: "97%"}
	    98% { content: "98%"}
	    99% { content: "99%"}
	    100% { content: "100%"}
	}`,
	`.loader {
	  font-size: 48px;
	  display: inline-block;
	  font-family: Arial, Helvetica, sans-serif;
	  font-weight: bold;
	  color: #263238;
	  box-sizing: border-box;
	  text-shadow: 0 0 2px #FFF, 0 0 1px #FFF, 0 0 1px #FFF;
	  letter-spacing: 2px;
	  position: relative;
	}
	.loader::after {
	  content: 'Loading';
	  position: absolute;
	  left: 0;
	  top: 0;
	  color: #FFF;
	  width: 100%;
	  height: 100%;
	  overflow: hidden;
	  box-sizing: border-box;
	  animation: animloader 6s linear infinite;
	}

	@keyframes animloader {
	  0% {
	    width: 0%;
	  }
	  100% {
	    width: 100%;
	  }
	}`,
	`.loader {
      position: relative;
      width: 120px;
      height: 90px;
      margin: 0 auto;
    }
    .loader:before {
      content: "";
      position: absolute;
      bottom: 30px;
      left: 50px;
      height: 30px;
      width: 30px;
      border-radius: 50%;
      background: #FF3D00;
      animation: loading-bounce 0.5s ease-in-out infinite alternate;
    }
    .loader:after {
      content: "";
      position: absolute;
      right: 0;
      top: 0;
      height: 7px;
      width: 45px;
      border-radius: 4px;
      box-shadow: 0 5px 0 #fff, -35px 50px 0 #fff, -70px 95px 0 #fff;
      animation: loading-step 1s ease-in-out infinite;
    }

    @keyframes loading-bounce {
      0% { transform: scale(1, 0.7)}
      40% { transform: scale(0.8, 1.2)}
      60% { transform: scale(1, 1)}
      100% { bottom: 140px }
    }
    @keyframes loading-step {
      0% {
        box-shadow: 0 10px 0 rgba(0,0,0,0),
                    0 10px 0 #fff,
                  -35px 50px 0 #fff,
                  -70px 90px 0 #fff;
      }
      100% {
        box-shadow: 0 10px 0 #fff,
                  -35px 50px 0 #fff,
                  -70px 90px 0 #fff,
                  -70px 90px 0 rgba(0,0,0,0);
      }
    }`,
    `.loader {
      width: 32px;
      height: 84px;
      border-radius: 0 0 20px 20px;
      position: relative;
      background: #FFF radial-gradient(circle 5px at 50% 85%, #FF3D00 100%, transparent 0);
    }
    .loader:before , .loader:after {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      width: 32px;
      height: 84px;
      border-radius: 0 0 20px 20px;
      background: #FFF;
      opacity: 0.8;
      transform: rotate(60deg);
      transform-origin: 50% 85%;
      z-index: -2;
      animation: rotate 1s infinite linear alternate;
    }
    .loader:after {
      animation: rotate2 1s infinite linear alternate;
      opacity: 0.5;
    }
    @keyframes rotate {
      0% , 20% { transform: rotate(0deg) }
      80% , 100% { transform: rotate(30deg) }
    }
    @keyframes rotate2 {
      0% , 20% { transform: rotate(0deg) }
      80% , 100% { transform: rotate(60deg) }
    }
  `,
  `
	.loader {
      width: 64px;
      height: 64px;
      position: relative;
      background: #FFF;
      border-radius: 4px;
      overflow: hidden;
    }
    .loader:before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      width: 40px;
      height: 40px;
      transform: rotate(45deg) translate(30%, 40%);
      background: #ff9371;
      box-shadow: 32px -34px 0 5px #ff3d00;
      animation: slide 2s infinite ease-in-out alternate;
    }
    .loader:after {
      content: "";
      position: absolute;
      left: 10px;
      top: 10px;
      width: 16px;
      height: 16px;
      border-radius: 50%;
      background: #ff3d00;
      transform: rotate(0deg);
      transform-origin: 35px 145px;
      animation: rotate 2s infinite ease-in-out;
    }

    @keyframes slide {
      0% , 100%{ bottom: -35px}
      25% , 75%{ bottom: -2px}
      20% , 80%{ bottom: 2px}
    }
    @keyframes rotate {
      0% { transform: rotate(-15deg)}
      25% , 75%{ transform: rotate(0deg)}
      100% {  transform: rotate(25deg)}
    }
  `,
  `.loader {
	box-sizing: border-box;
	display: inline-block;
	width: 50px;
	height: 80px;
	border-top: 5px solid #fff;
	border-bottom: 5px solid #fff;
	position: relative;
	background: linear-gradient(#FF3D00 30px, transparent 0) no-repeat;
	background-size: 2px 40px;
	background-position: 50% 0px;
	animation: spinx 5s linear infinite;
	}
	.loader:before, .loader:after {
	content: "";
	width: 40px;
	left: 50%;
	height: 35px;
	position: absolute;
	top: 0;
	transform: translatex(-50%);
	background: rgba(255, 255, 255, 0.4);
	border-radius: 0 0 20px 20px;
	background-size: 100% auto;
	background-repeat: no-repeat;
	background-position: 0 0px;
	animation: lqt 5s linear infinite;
	}
	.loader:after {
	top: auto;
	bottom: 0;
	border-radius: 20px 20px 0 0;
	animation: lqb 5s linear infinite;
	}
	@keyframes lqt {
	0%, 100% {
		background-image: linear-gradient(#FF3D00 40px, transparent 0);
		background-position: 0% 0px;
	}
	50% {
		background-image: linear-gradient(#FF3D00 40px, transparent 0);
		background-position: 0% 40px;
	}
	50.1% {
		background-image: linear-gradient(#FF3D00 40px, transparent 0);
		background-position: 0% -40px;
	}
	}
	@keyframes lqb {
	0% {
		background-image: linear-gradient(#FF3D00 40px, transparent 0);
		background-position: 0 40px;
	}
	100% {
		background-image: linear-gradient(#FF3D00 40px, transparent 0);
		background-position: 0 -40px;
	}
	}
	@keyframes spinx {
	0%, 49% {
		transform: rotate(0deg);
		background-position: 50% 36px;
	}
	51%, 98% {
		transform: rotate(180deg);
		background-position: 50% 4px;
	}
	100% {
		transform: rotate(360deg);
		background-position: 50% 36px;
	}
	}
    `,
	`.loader {
	width: 48px;
	height: 48px;
	display: inline-block;
	position: relative;
	background-color: #FFF;
	background: radial-gradient(ellipse at center, #FF3D00 0%, #FF3D00 14%, #FFF 15%, #FFF 100%);
	background-size: cover;
	background-position: center;
	border-radius: 50%;
	}
	.loader::after,
	.loader::before {
	content: '';  
	position: absolute;
	height: 16px;
	width: 4px;
	background: #FF3D00;
	top: 50%;
	left: 50%;
	transform: translateX(-50%) rotate(0deg);
	transform-origin: 25% 0;
	box-sizing: border-box;
	animation: rotation 10s linear infinite;
	}
	.loader::before {
	height: 22px;
	width: 2px;
	transform: translateX(-50%) rotate(0deg);
	animation-duration: 1s;
	} 
	@keyframes rotation {
	0%    { transform: rotate(0deg)}
	100%  { transform: rotate(360deg)}
	}`,
	`.loader {
		width: 150px;
		height: 150px;
		background-color: #ff3d00;
		border-radius: 50%;
		position: relative;
		box-shadow: 0 0 30px 4px rgba(0, 0, 0, 0.5) inset,
		0 5px 12px rgba(0, 0, 0, 0.15);
		overflow: hidden;
	}
	.loader:before,
	.loader:after {
		content: "";
		position: absolute;
		width: 100%;
		height: 100%;
		border-radius: 45%;
		top: -40%;
		background-color: #fff;
		animation: wave 5s linear infinite;
	}
	.loader:before {
		border-radius: 30%;
		background: rgba(255, 255, 255, 0.4);
		animation: wave 5s linear infinite;
	}
	@keyframes wave {
		0% {
		transform: rotate(0);
		}
		100% {
		transform: rotate(360deg);
		}
	}`,
	`.loader {
	width: 175px;
	height: 80px;
	display: block;
	margin:auto;
	background-image: linear-gradient(#263238 50px, transparent 0), radial-gradient(circle 25px at 25px 25px, #FFF 100%, transparent 0), radial-gradient(circle 50px at 50px 50px, #FFF 100%, transparent 0), radial-gradient(circle 25px at 25px 25px, #FFF 100%, transparent 0), linear-gradient(#FFF 50px, transparent 0);
	background-size: 64px 6px, 50px 50px, 100px 76px, 50px 50px, 120px 40px;
	background-position: 55px 60px, 0px 30px, 37px 0px, 122px 30px, 25px 40px;
	background-repeat: no-repeat;
	position: relative;
	box-sizing: border-box;
	}
	.loader::after {
	content: '';  
	position: absolute;
	left: 50%;
	transform: translateX(-50%) rotate(-180deg);
	top: 62px;
	height: 64px;
	width: 60px;
	background-color: #FFF;
	background-image: linear-gradient(#DDD 20px, transparent 0), linear-gradient(#DDD 5px, transparent 0), linear-gradient(#DDD 10px, transparent 0), linear-gradient(#DDD 10px, transparent 0);
	background-size: 50px 20px;
	background-position: 5px 36px, 5px 25px, 5px 10px;
	background-repeat: no-repeat;
	border-radius: 2px 2px 4px 4px;
	z-index: 10;
	box-shadow: 0px -4px 7px rgba(0, 0, 0, 0.5);
	box-sizing: border-box;
	animation: animloader 4s linear infinite;
	}

	@keyframes animloader {
	0% {
		height: 64px;
	}
	90%, 100% {
		height: 0px;
	}
	}`,
	`.loader {
	position: relative;
	background: #ff3d00;
	width: 80px;
	height: 30px;
	line-height: 18px;
	text-align: center;
	color: #931010;
	font-weight: 700;
	letter-spacing: 0.5px;
	font-size: 14px;
	box-sizing: border-box;
	border: 5px groove #de3500;
	border-radius: 0 0 4px 4px;
	box-shadow: 0 5px 7px #0002;
	}
	.loader:before {
	content: "";
	width: 70px;
	height: 80px;
	background: #fff;
	box-shadow: 0 0 10px #0003;
	position: absolute;
	left: 50%;
	transform: translatex(-50%);
	bottom: calc(100% + 6px);
	animation: loadPaper 4s ease-in infinite;
	}
	.loader:after {
	content: "";
	width: 70px;
	height: 80px;
	background: linear-gradient(to right, #fff 50%, #0000 51%);
	background-size: 9px 80px;
	position: absolute;
	left: 50%;
	transform: translatex(-50%);
	top: calc(100% + 6px);
	animation: disposePaper 4s ease-in infinite;
	}

	@keyframes loadPaper {
	0%,
	10% {
		height: 80px;
		bottom: calc(100% + 40px);
	}
	50% {
		height: 80px;
		bottom: calc(100% + 6px);
	}
	75%,
	100% {
		height: 0px;
		bottom: calc(100% + 6px);
	}
	}

	@keyframes disposePaper {
	0%,
	50% {
		height: 0px;
		top: calc(100% + 6px);
	}
	75% {
		height: 80px;
		top: calc(100% + 6px);
		opacity: 1;
	}
	100% {
		height: 80px;
		top: calc(100% + 40px);
		opacity: 0;
	}
	}`,
	`.loader {
		position: relative;
		width: 120px;
		height: 55px;
		background-repeat: no-repeat;
		background-image:
		radial-gradient(circle 2.5px , #ff3d00  100%, transparent 0),
		linear-gradient(#525252 90px, transparent 0),
		linear-gradient(#ececec 120px, transparent 0),
		linear-gradient(to right, #eee 10%,#333 10%,#333 90%,#eee 90%)
		;

		background-size: 5px 5px, 90px 10px, 120px 45px , 100px 15px;
		background-position: 110px 15px,center bottom , center bottom , center 0 ;

	}
	.loader:before {
		content: "";
		width: 70px;
		background-color: #fff;
		box-shadow: 0 0 10px #0003;
		position: absolute;
		left: 50%;
		transform: translatex(-50%);
		bottom: calc(100% - 10px);
		animation: printerPaper 4s ease-in infinite;
	}
	.loader:after {
		content: "";
		width: 70px;
		height: 80px;
		background-color: #fff;
		background-image:   linear-gradient(to bottom, #FFF 50%, #ff3d00  51%),
							linear-gradient(to bottom, #bbb 50%, #0000 51%);
		background-size: 60px 20px,  60px 10px;
		background-repeat: no-repeat, repeat-y;
		background-position: center 55px , center 0;
		position: absolute;
		left: 50%;
		transform: translatex(-50%) rotate(180deg);
		box-shadow: 0 10px #fff inset;
		top: calc(100% - 8px);
		animation: PrintedPaper 4s ease-in infinite;
	}

	@keyframes printerPaper {
		0% , 25% { height: 50px}
		75%, 100% { height: 0}
	}

	@keyframes PrintedPaper {
		0%, 30% {
		height: 0px;
		top: calc(100% - 8px);
		}

		80% {
		height: 80px;
		top: calc(100% - 8px);
		opacity: 1;
		}
		100% {
		height: 80px;
		top: calc(100% + 10px);
		opacity: 0;
		}
	}`
];

/*
	9	- fun little game
	2 	- nice loader
	4	- infinite loader
	19 	- another infinite loader
	14	- morpher
	27	- img loader
	28	- hourglass
	33	- printer loader
*/

function spawnloader(n,holder) {
	if(n >= loaders.length){n = Math.floor(Math.random() * loaders.length);}

	console.log(`loader number ${n}`);

	let loadguy = holder == undefined ? document.body : holder;
	let m = undefined;

	if(loadguy.querySelector('.loader') == undefined){
		m = document.createElement('div');
		m.className = "loader";
		loadguy.appendChild(m);
	}

	if(loadguy.querySelector('style') == undefined){
		m = document.createElement('style');
		loadguy.appendChild(m);
	} else {
		m = loadguy.querySelector('style');
	}

	m.innerHTML = loaders[n];
}