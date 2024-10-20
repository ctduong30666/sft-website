<div id="device-box" class="device-box">
    <div class="device-left">
        <div class="device-left-bottom">
            <div class="sketchfab-embed-wrapper"> <iframe id="sketchfab-iframe" style="border-radius: 10px 0px 0px 10px; margin-top:4px" width="280px" height="330px" autoplay="true"
                    src="https://sketchfab.com/models/542274618520405e83ff5f1dfeaca3f5/embed"
                    frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true"
                    allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                    execution-while-out-of-viewport execution-while-not-rendered web-share></iframe></div>
            <script>
                window.addEventListener('resize', function() {
                    const iframe = document.getElementById('sketchfab-iframe');
                    const width = window.innerWidth;
                    console.log(width);
                    const height = window.innerHeight;
                    if (width < 768) {
                        iframe.style.width = '100%';
                        iframe.style.height = '100%';
                    } else {
                        iframe.style.width = '280px';
                        iframe.style.height = '330px';
                    }
                });
            </script>
        </div>
    </div>
    <div class="device-right">
        <div class="device-right-top">
            <span>CÁ NHÂN HOÁ THIẾT BỊ</span>
        </div>
        <div id="device-right-content" class="device-right_content">
            <div class="water">
                <div class="first-item">
                    <span id="water-amount" class="water-amount">Lượng nước: </span>
                    <div class="dropdown">
                        <div class="select">
                            <div class="selected" style="font-size:13px;">Tự động</div>
                            <div class="caret"></div>
                        </div>
                        <ul class="dropdown-menu">
                            <li class="active">Tự động</li>
                            <li>Thủ công</li>
                        </ul>
                    </div>
                </div>
                <div id="slider-box" class="second-item slider-disable">
                    <div class="range_slider">
                        <input id="slider" type="range" class="slider" min="0" max="10" value="0">
                        <div class="slider-bottom">
                            <p class="slider-value">Giá trị: <span
                                    style="font-weight: bold; font-family: 'Roboto Condensed', sans-serif;"
                                    id="value">5</span> <span
                                    style="font-family: 'Roboto Condensed', sans-serif;">lít</span></p>
                            <button class="slider-button">Xả nước</button>
                        </div>

                    </div>
                </div>
                <div class="third-item">
                    <div class="toggle-lid">
                        <div class="toggle-lid_text">Mở/Đóng nắp:</div>
                        <div class="toggle-lid_button">
                            <button class="toggle-lid_button_off">ĐÓNG</button>
                            <button class="toggle-lid_button_on">MỞ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const dropdowns = document.querySelectorAll('.dropdown');
    var sliderBox = document.getElementById('slider-box');
    dropdowns.forEach(dropdown => {
        const select = dropdown.querySelector('.select');
        const caret = dropdown.querySelector('.caret');
        const menu = dropdown.querySelector('.dropdown-menu');
        const options = dropdown.querySelectorAll('.dropdown-menu li');
        const selected = dropdown.querySelector('.selected');
        select.addEventListener('click', () => {
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                selected.innerText = option.innerText;
                select.classList.remove('select-clicked');
                caret.classList.remove('caret-rotate');
                menu.classList.remove('menu-open');
                options.forEach(option => {
                    option.classList.remove('active');
                });
                option.classList.add('active');
                if (option.innerText === 'Thủ công') {
                    sliderBox.classList.remove('slider-disable');
                } else {
                    sliderBox.classList.add('slider-disable');
                }
            });
        });
    });
</script>
<script>
    var slider = document.getElementById('slider');
    var output = document.getElementById('value');

    output.innerHTML = slider.value;

    slider.oninput = function () {
        output.innerHTML = this.value;
    }
</script>