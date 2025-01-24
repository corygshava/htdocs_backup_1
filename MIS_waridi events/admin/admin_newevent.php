<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/eventer.css">
    <link rel="stylesheet" href="../css/forms.css">

    <title>New event</title>
</head>
<body>
    <nav class="w3-bar w3-text-white containerbg">
        <a class="" href="index.php">
            <i class="fa fa-dashboard"></i>
            <b>New event</b>
        </a>

        <a href="#" class="w3-right">
            <b><i style="font-family: cursive !important;">Waridi Event Management system</i></b>
        </a>
    </nav>

    <div class="content">
        <div class="formholder">
            <div class="heading w3-center">
                <h2>Add new event</h2>
                <p>Enter details to register a new event</p>
            </div>
            <form class="theform" action="worker_addevent.php" method="post">
                <div class="w3-row">
                    <div class="w3-col m6">
                        <div>
                            <label for="eventname">Event name</label><br>
                            <input type="text" name="eventname" placeholder="enter event name" required>
                        </div>
                        <div>
                            <label for="eventdate">Event date</label><br>
                            <input type="date" name="eventdate" placeholder="when is the event" required>
                        </div>
                        <div>
                            <label for="starttime">start time</label><br>
                            <input type="time" name="starttime" placeholder="when does it start" required>
                        </div>
                        <div>
                            <label for="endtime">end time</label><br>
                            <input type="time" name="endtime" placeholder="when does it end" required>
                        </div>
                    </div>
                    <div class="w3-col m6">
                        <div>
                            <label for="ticketprice">ticket price</label><br>
                            <input type="number" name="ticketprice" placeholder="enter ticket price" required>
                        </div>
                        <div>
                            <label for="venue">Venue</label><br>
                            <input type="text" name="venue" placeholder="enter venue address" required>
                        </div>
                        <div>
                            <label for="description">Event description</label><br>
                            <textarea name="description" rows="5" placeholder="enter a short description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="items">
                    <label for="themecolor">Theme color</label><br>
                    <input type="hidden" name="themecolor" value="0">
                    <a class="theme1 current" onclick="chooseTheme(1)">theme 1</a>
                    <a class="theme2" onclick="chooseTheme(2)">theme 2</a>
                    <a class="theme3" onclick="chooseTheme(3)">theme 3</a>
                    <a class="theme4" onclick="chooseTheme(4)">theme 4</a>
                    <a class="theme5" onclick="chooseTheme(5)">theme 5</a>
                    <a class="theme6" onclick="chooseTheme(6)">theme 6</a>
                    <a class="theme7" onclick="chooseTheme(7)">theme 7</a>
                    <a class="theme8" onclick="chooseTheme(8)">theme 8</a>
                </div>

                <div class="buttons w3-center">
                    <button class="themebtn" type="submit">add event</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function chooseTheme(n) {
            let thenpt = document.forms[0].themecolor;
            thenpt.value = n;
            let thebtns = document.querySelector('.items').querySelectorAll('a');

            thebtns.forEach((item,all) => {
                item.classList.remove('current');
            })

            thebtns[n-1].classList.add('current');
        }
    </script>
</body>
</html>