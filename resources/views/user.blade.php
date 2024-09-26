<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url({{asset('css/user.css')}});
        body {
            margin:0px auto;
            padding:0px 15%;
            height: auto;
            border: 1px solid black;
        }
        .profileNstat {
            display: flex;
            background-color: brown;
            justify-content: space-between;
        }
        .group1 {
            display: flex;
        }
        .pfpInfo {
            background-color: orange;
        }
        .makeCenter {
            display: flex;
            align-items: center;
        }
        .stat {
            display: flex;
            background-color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="profileNstat">
        <div class="group1">
            <div> <img id='pfp' src="img/Teriri7.png" alt=""> </div>
            <div class="pfpInfo makeCenter">
                <div>
                    <p>Sei_2772</p>
                    <p>theresa2703@mail.com</p>
                    <div id='tier'>Tier - ทาส</div>
                    <div id='firstDaylogin'>Joined - Mar 2, 2021</div>
                </div>
            </div>
        </div>
        <div class="makeCenter">
            <div class="stat">
                <div id='totalComment'><p>comment</p> 7 </div>
                <div id='totalVote'><p>vote</p> 0 </div>
                <div id='totalDonate'><p>donate</p> 7 <p>Baht</p></div>
            </div>
        </div>
    </div>

    <div class="collectionZone">
        <div class="button">
            <button> COLLECTION </button>
            <button> POSTING </button>
        </div>
        <div class="AllUrCollection">
            Homei (waiting for code)
        </div>
        <div class="AllUrPosting">
            Homu (waiting for code)
        </div>
    </div>
</body>
</html>
</x-app-layout>