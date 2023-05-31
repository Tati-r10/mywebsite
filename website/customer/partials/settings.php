    <!--Accessibility Settings starts here-->
    <aside id="settings">
        
        <img class="responsiveImg" tabindex="0" aria-label="Open accessibility settings" src="../images/accessibility.png" alt="Accessibility Settings" onfocus="openSettings()">
    
        <div aria-label="Choose your visual presentation preferences"  role="form" id="settingsBox">

            <div id="setMenu"> 
                <label for="resetBtn" hidden>Reset Settings</label>
                <input aria-label="Reset settings" type="button" class="setButtons" id="resetBtn" value="Reset Settings" onclick="resetSettings()">

                <label for="closeBtn" hidden>Close Settings</label>
                <input aria-label="Close settings" type="button" class="setButtons" id="closeBtn" value="X" onclick="closeSettings()">
            </div>

            <h2>Accessibility Settings</h2>

            <div id="setBColors">
                <label for="backColor" class="setTitle">Choose color for background: </label>
                <input id="backColor" type="color" onclick="changeBcolor()">
            </div>

            <div id="setFColors">
                <label for="fontColor" class="setTitle">Choose font color: </label>
                <input id="fontColor" type="color" onclick="changeFcolor()">
            </div>

            <div id="setFSize">
                <fieldset>
                    <legend for="sizes" class="setTitle" tabindex="0">Choose text size:</legend>
                    
                    <div class="fontSizes" id="no16">
                        <label for="size16">Size 1</label>
                        <input type="radio" name="sizes" id="size16" onclick="changeFsize(16)">
                    </div>

                    <div class="fontSizes" id="no20">
                        <label for="size20">Size 2</label>
                        <input type="radio" name="sizes" id="size20" onclick="changeFsize(20)">
                    </div>

                    <div class="fontSizes" id="no24">
                        <label for="size24">Size 3</label>
                        <input type="radio" name="sizes" id="size24" onclick="changeFsize(24)">
                    </div>

                    <div class="fontSizes" id="no28">
                        <label for="size28">Size 4</label>
                        <input type="radio" name="sizes" id="size28" onclick="changeFsize(28)">
                    </div>

                    <div class="fontSizes" id="no32">
                        <label for="size32">Size 5</label>
                        <input type="radio" name="sizes" id="size32" onclick="changeFsize(32)">
                    </div>
                </fieldset>
            </div>

            <div id="allLinks">
                <p class="setTitle">Highlight page's links</p>
                <button aria-pressed="false" class="setButtons" id="highlight" onclick="highlightLinks()">Highlight links</button>
                <br>
            </div>
        </div>
</aside>
    <!--Accessibility Settings ends here-->