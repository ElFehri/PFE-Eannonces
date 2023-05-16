@extends('layouts.app')
@section('title',' Information')
@section('content')
{{-- content --}}

<div id="container">	
	
	<div class="publication-details">
		
		{{-- <h1>{{ $information->content }}</h1> --}}
		<p class="information">" {{ $information->content }} "</p>	
		<div class="btns">
			<button class="btn"><span class="date">{{ date('Y-m-d\TH:i', strtotime($publication->start_date)) }}</span></button>
			<button class="btn"><span class="date">{{ date('Y-m-d\TH:i', strtotime($publication->end_date)) }}</span></button>
		</div>
			
	</div>
</div>

    {{-- styles --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap');


body {
background: #DFC2F2;
	background-image: linear-gradient( to right, #ffffb3,#ffe6e6);
	background-attachment: fixed;	
	background-size: cover;
  
	}

#container{
	box-shadow: 0 15px 30px 1px grey;
	background: rgba(255, 255, 255, 0.90);
	text-align: center;
	border-radius: 5px;
	overflow: hidden;
	margin: 5em auto;
	height: 350px;
	width: 55%;
  
	
}



.publication-details {
	position: relative;
	text-align: left;
	overflow: hidden;
	padding: 30px;
	height: 100%;
	float: left;
	width: 80%;

}

#container .publication-details h1{
	font-family: 'Bebas Neue', cursive;
	display: inline-block;
	position: relative;
	font-size: 30px;
	color: #344055;
	margin: 0;
	
}

#container .publication-details h1:before{
	position: absolute;
	content: '';
	right: 0%; 
	top: 0%;
	transform: translate(25px, -15px);
	font-family: 'Bree Serif', serif;
	display: inline-block;
	background: #ffe6e6;
	border-radius: 5px;
	font-size: 14px;
	padding: 5px;
	color: white;
	margin: 0;
	animation: chan-sh 6s ease infinite;

}

#container .publication-details > p {
font-family: 'EB Garamond', serif;
	text-align: center;
	font-size: 18px;
	color: #7d7d7d;
	
}
.control{
	position: absolute;
	bottom: 20%;
	left: 22.8%;
	
}

.btn {
	color: aliceblue;
	background:  #212225;
	font-weight: bold;
	margin-top: 100px;
	margin-left: 20px;
	border-radius: 5px;
  	overflow: hidden;
	cursor: pointer;
}


.btn span {
	font-family: 'Farsan', cursive;
	transition: transform 0.3s;
	display: inline-block;
  	padding: 10px 20px;
	font-size: 1.2em;
	margin:0;
	
}
.btn .date, .shopping-cart{
	background: #333;
	border: 0;
	margin: 0;
}


/* .publication-image {
	transition: all 0.3s ease-out;
	display: inline-block;
	position: relative;
	overflow: hidden;
	height: 100%;
	float: right;
	width: 45%;
	display: inline-block;
}

#container img {width: 100%;height: 100%;} */

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Bree Serif', serif;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.8;
    text-align: left;
    font-size: 105%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}
    </style>
@endsection