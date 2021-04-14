            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Simple portfolio website</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Privacy & Terms</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>

<script>
    document.getElementById("ind").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/index');?>";   
    };

    document.getElementById("blg").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/blog');?>";   
    };

    document.getElementById("abt").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/about');?>";   
    };

    document.getElementById("cnt").onclick=function()
    {
        window.location.href="<?php echo site_url('Intro/contact');?>";   
    };
</script>

</body>

</html>
