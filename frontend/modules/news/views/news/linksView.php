<?php
use ijackua\sharelinks\ShareLinks;
use \yii\helpers\Html;

/**
 * @var yii\base\View $this
 */

?>

<div class="socialShareBlock">
    <?=
    Html::a('<b class = "btn azm-social azm-size-32 azm-r-square azm-facebook"><i class="fa fa-facebook"></i></b>', $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        ['title' => 'Share to Facebook']) ?>
    <?=
    Html::a('<b class = "btn azm-social azm-size-32 azm-r-square azm-twitter"><i class="fa fa-twitter"></i></b>', $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        ['title' => 'Share to Twitter']) ?>
    <?=
    Html::a('<b class = "btn azm-social azm-size-32 azm-r-square azm-linkedin"><i class="fa fa-linkedin"></i></b>', $this->context->shareUrl(ShareLinks::SOCIAL_LINKEDIN),
        ['title' => 'Share to LinkedIn']) ?>
    <?=
    Html::a('<b class = "btn azm-social azm-size-32 azm-r-square azm-google-plus"><i class="fa fa-google-plus"></i></b>', $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        ['title' => 'Share to Google Plus']) ?>
    <?=
    Html::a('<b class = "btn azm-social azm-size-32 azm-r-square azm-vk"><i class="fa fa-vk"></i></b>', $this->context->shareUrl(ShareLinks::SOCIAL_VKONTAKTE),
        ['title' => 'Share to Vkontakte']) ?>
</div>
