<style>
body {
	background-color: #151719;
}
.terminal-bar > div.icon-btn:first-child {
    margin-left: 0.6rem;
}

.terminal-bar > div.icon-btn:not(:first-child) {
    margin-left: 0.5rem;
}

.terminal-bar > div.icon-btn:last-child {
    margin-right: 0.6rem;
}

.terminal-window {
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    height: 80%;
    padding: .5rem 0rem 0rem .5rem;
    display: flex;
    flex-direction: column;
}


.shadow {
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.55);
    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.55);
    box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);
}

.terminal-bar-text {
    position: absolute;
    margin-top: 3px;
    color: #383838;
    width: 100%;
    text-align: center;
    font-weight: 500;
}

.has-equal-height {
    height: 100%;
    display: flex;
    flex-direction: column;
}

.terminal-output {
    overflow-y: hidden;
    overflow: auto;
}

.column-child {
    flex: 1;
}

.terminal-line {
    position: relative;
    font-family: 'Anonymous Pro', monospace;
    font-size: .9rem;
    color: #b7c5d2;
}

.directory {
    color: #75e1e7;
    font-weight: 500;
}

.success {
    color: #8dd39e;
}

.code, .error, .fa-heart {
    color: #d7566a
}

.fa-heart {
    padding-top: 0.5rem;
}

.dummy-keyboard {
    background: transparent;
	border: none;
	outline: none;
}
</style>
<?php
$post = $_POST['q'];
$pre = $_POST['pre'];
$user = "anonymous";
$hostname = "mydomain.com";
$prefix = "$user@$hostname:";
$commands = [
    "a" => "b",
    "b" => "c",
    "c" => "d",
];

foreach($commands AS $trigger => $action) {
	if($post == $trigger) {
		$answer = "$action";
	}
}
if(empty($answer)) {
	$answer = "no such command: $post";
}
$answer .= "<br />";
$history = "$pre<span class='success'>$prefix</span> <span class='directory'>~$</span> <span class='user-input' id='userInput'>$post</span><br />$answer";
?>
<title>Terminal v3 - SERVER</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <div class="terminal-window primary-bg" onclick="document.getElementById('dummyKeyboard').focus();">
              <div class="terminal-output" id="terminalOutput">
                <div class="terminal-line">
                  <span class="help-msg">A warm welcome! — Type <span class="code">help</span>
                    for a list of all public commands.</span>
                </div>
              </div>
              <div class="terminal-line"><?php if (!empty($post)) { echo $history; }?>
                <span class="success"><?php echo $prefix; ?></span> <span class="directory">~$</span> <span class="user-input" id="userInput"></span>
				 <form class="dummyKeyboard" id="cloudform" style="display:inline;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" autofocus autocomplete="off" maxlenght="100" size="110" id="dummyKeyboard" name="q" class="dummy-keyboard" style="color: #b7c5d2 !important;"><?php if (!empty($post)):?><input type="hidden" name ="pre" value="<?php echo $history; ?>"><?php endif; ?>
</form>
              </div>
            </div>
