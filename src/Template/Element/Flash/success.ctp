<?php

if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message success" onclick="this.classList.add('hidden')" style="margin-bottom:20px;text-align:center;margin-top:20px;font-weight:bold;"><?= $message ?></div>
