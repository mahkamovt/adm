<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\models;

/**
 * Html provides a set of static methods for generating commonly used HTML tags.
 *
 * Nearly all of the methods in this class allow setting additional html attributes for the html
 * tags they generate. You can specify, for example, `class`, `style` or `id` for an html element
 * using the `$options` parameter. See the documentation of the [[tag()]] method for more details.
 *
 * For more details and usage information on Html, see the [guide article on html helpers](guide:helper-html).
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HtmlExtend extends \yii\helpers\Html
{
	public static function img($src, $options = [])
    {
        $options['data-original'] = \yii\helpers\Url::to($src);

        if (isset($options['srcset']) && is_array($options['srcset'])) {
            $srcset = [];
            foreach ($options['srcset'] as $descriptor => $url) {
                $srcset[] = Url::to($url) . ' ' . $descriptor;
            }
            $options['srcset'] = implode(',', $srcset);
        }

        if (!isset($options['alt'])) {
            $options['alt'] = '';
        }

        return static::tag('img', '', $options);
    }
}
