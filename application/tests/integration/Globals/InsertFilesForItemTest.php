<?php
/**
 * @version $Id$
 * @copyright Center for History and New Media, 2007-2010
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @package Omeka
 */

/**
 * 
 *
 * @package Omeka
 * @copyright Center for History and New Media, 2007-2010
 */
class InsertFilesForItemTest extends Omeka_Test_AppTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->item = insert_item(array('public' => true));
    }
    
    public function assertPreConditions()
    {
        $this->assertThat($this->item, $this->isInstanceOf('Item'));
        $this->assertTrue($this->item->exists());
    }
    
    public function testCanInsertFilesForAnItem()
    {
        $fileUrl = TEST_DIR . '/_files/test.txt';
        $files = insert_files_for_item($this->item, 'Filesystem', array($fileUrl));
        $this->assertEquals(1, count($files));
        $this->assertThat($files[0], $this->isInstanceOf('File'));
        $this->assertTrue($files[0]->exists());
    }
}