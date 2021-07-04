<?php

use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \yii\mail\BaseMessage $content
 */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<?= $content ?>
<?php $this->endBody() ?>

<table border="0" cellpadding="0" cellspacing="0" width="500">
    <tbody>
    <tr>
        <td height="64" style="font-family:Helvetica, Arial, sans-serif; font-size:18px; font-style:bold;">
            <strong>MaxiOrphy</strong>
            <br>
            <em style="font-size:17px; font-weight:400;">Official Website</em>
        </td>
    </tr>
    <tr>
        <td height="70">
            <small style="font-family:Helvetica, Arial, sans-serif; font-size:10px; color:#4d4d4e;">Please do not answer this email. For any doubt contact us at our Client Support email address</small>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
<?php $this->endPage() ?>
