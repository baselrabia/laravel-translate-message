<?php

namespace Tests;

use Tests\TestCase;

/**
 *  @author Basel Rabia 
 *  @package laravel-translate-message
 *  @version 1.0.0
 *   you are welcome to add your own test cases, we will be happy to see your support
 *   if you have any questions or suggestions please contact us through our github page
 *   open issues and pull requests are also welcome
 * 
 */
class HelpersTest extends TestCase
{
    public function test_autoloading()
    {
        $this->assertTrue(__t('pub.Hello World') === 'Hello World');
    }
   
    public function test_send_without_clear_group()
    {
        $this->assertTrue(__t('Hello World') === 'Hello World');
    }
    
    public function test__send_without_clear_group_with_dot_notation()
    {
        $this->assertTrue(__t('pub.pub.Hello World') === 'pub.pub.Hello World');
    }

    ######################################
    

    public function test_the_two_style_of_trans_working()
    {
        $this->assertTrue(__t('pub.Hello World') === ___('pub.Hello World'));
    }
    
    public function test_Arabic_trans()
    {
        app()->setlocale('ar');
        
        $this->assertTrue(__t('pub.Hello World') === 'مرحبا بالعالم');
    }
    
    public function test_Dutch_trans()
    {
        app()->setlocale('nl');
        
        $this->assertTrue(__t('pub.Hello World') === 'Hallo Wereld');
    }
    
    ###############################################

    public function test_translation_of_arabic_exists_after_translate_first_in_en()
    {
        app()->setlocale('en');

        $this->assertTrue(__t('pub.World') === 'World');

        app()->setlocale('ar');

        $this->assertTrue(__t('pub.World') === "العالمية");

    }


    

}
