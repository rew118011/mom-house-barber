<!-- .toggle start -->
<div class="toggle" data-toggle="1">
    <i class="fas fa-bars"></i>
</div>
<!-- .toggle finish -->
</div>
<!--   #content finish -->
</div>
<!--   container finish -->
<script>
    const toggle = document.querySelector(".toggle");
    const slideBar = document.querySelector(".sideBar");
    const stories = document.querySelector(".stories");
    toggle.addEventListener("click", () => {
        if (toggle.dataset.toggle == 1) {
            slideBar.style.width = "0";
            toggle.dataset.toggle = 0;
            stories.style.width = "calc(100vw - 100px)";
        } else {
            slideBar.style.width = "300px";
            toggle.dataset.toggle = 1;
            stories.style.width = "calc(100vw - 400px)";
        }
    });
</script>

<script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll("a");
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        if (menuItem[i].href === currentLocation) {
            menuItem[i].className = "active";
        }
    }
</script>
</body>

</html>