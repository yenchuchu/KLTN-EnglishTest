<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2018 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);


    //thoi gian bắt đầu đếm lùi
    var thoigian = 100000;
    //đơn vị đếm là giây hoặc phút
    var donvi = "giây";
    //khoach cách giữa 2 lần giảm, đơn vị là ms
    var khoangcach = 1000; // =1s
    if (donvi == "phút") khoangcach = 60000; //=1 phút
    //cố định giá trị thời gian bằng biến bandau
    var bandau = thoigian;
    //đưa thời gian bắt đầu đếm vào button
    document.getElementById("dem").innerHTML = " "+thoigian.toString();
    //tạo sự kiện mở tab mới
    document.getElementById("click").addEventListener("click", opennewtab, false);
    //ẩn nút click
    document.getElementById("demnguoc").style.display = 'none';
    //đưa đơn vị là giây hoặc phút vào button
    document.getElementById("donvi").innerHTML = donvi;
    function demlui() {
        //khi nào bắt đầu đếm thì ẩn nút click và hiện thời gian
        document.getElementById("click").style.display = 'none';
        document.getElementById("demnguoc").style.display = 'block';
        //sau một khoảng thời gian là khoangcach thì thời gian trừ đi 1
        var timer = setInterval(function () {
            thoigian--;
            if (thoigian < 0) {
                //nếu đếm xong thì hiện nút click và ẩn thời gian
                document.getElementById("demnguoc").style.display = 'none';
                document.getElementById("click").style.display = 'block';
                //reset timer
                clearInterval(timer);
                //đặt lại time để chạy ltowisclick tới
                document.getElementById("dem").innerHTML = " "+bandau.toString();
                thoigian = bandau;
            } else {
                //nếu chưa đếm xong thì đưa thoigian=thoigian-1 vào button
                document.getElementById("dem").innerHTML = " "+thoigian.toString();
            }
        }, khoangcach);
    };
    //khi click thì mới chạy hàm demlui
    document.getElementById("click").onclick = demlui;
    //hàm mở tab mới
    function opennewtab(){
        return false;
//        var a = document.createElement("a");
//        a.href = "//sinhvienit.net/forum/u/717343";
//        var evt = document.createEvent("MouseEvents");
//        evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
//                true, false, false, false, 0, null);
//        a.dispatchEvent(evt);
    }

</script>