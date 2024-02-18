<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        body {
            background: url('bkg2.jpg') no-repeat  center;
            background-size: cover;
            color: black; /* White text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            margin-top: 100px;
            font-family: monospace;
            color: red;
            font-size:75px ;
        }

        button {
            background-color: black; /* Blue button color */
            color: #ffffff; /* White text color */
            font-size: 24px;
            padding: 20px 40px;
            margin: 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .contain{
            display: flex;
            justify-content: space-evenly;
        }
        .part{
            margin: 20px;
            padding: 40px;
            border: 1px dashed #ccc;
            border-radius: 25%;
            border-color: black;
    /* padding: 15px;   */
        }
        p{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h1>Fashion Trends</h1>
    <div class="contain">
        <div class="part">
        <button onclick="window.location.href='./Cutomer/login.php'">Shop!</button>
    
    <p>
    Explore a virtual garden of style where petals of fashion unfold before you. Immerse yourself in the vibrant hues of trendsetting attire, delicately woven with threads of elegance. Our online boutique invites you to dance through the meadows of chic designs, cultivating your unique fashion identity with each exquisite selection.
    </p>
    </div>
    <div class="part">
    
    <button onclick="window.location.href='./Product/login.php'">Manage Products</button>
    <p>
    Embark on a seamless journey as your coveted fashion finds prepare for their grand entrance. Our delivery service is the carriage that carries your carefully curated ensembles to your doorstep. Navigate the anticipation with ease, as each package is a promise of swift, secure, and enchanting delivery, ensuring your fashion dreams materialize effortlessly.
    </p>
    </div>

    <div class="part">
   
    <button onclick="window.location.href='./Delivery/login.php'">Let's Deliver</button>
    <p>
    Step into the realm of sartorial indulgence with the graceful ritual of adding products to your cart. As you peruse our virtual emporium, each click is a balletic gesture, selecting exquisite pieces to adorn your digital basket. The harmonious addition unfolds like a choreographed dance, bringing the allure of fashion closer to your fingertips.
    </p>
    </div>

    </div>
</body>
</html>
