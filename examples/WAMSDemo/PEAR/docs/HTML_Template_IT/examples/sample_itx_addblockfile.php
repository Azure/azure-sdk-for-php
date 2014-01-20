<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * An example for the usage of ITX::addBlockfile
 *
 * @version CVS: $Id: sample_itx_addblockfile.php 216180 2006-07-11 21:56:05Z dsp $
 */

require_once 'HTML/Template/ITX.php';

$data = array (array ('packagename'=>'mypackage',
                      'version'    =>'1.0',
                      'changelog'  => array ('fix bug #002',
                                             'add author FOO to AUTHORS')
                    ),
               array ('packagename'=>'mypackage',
                      'version'    =>'1.0 RC 1',
                      'changelog'  => array ('fix bug #002',
                                             'added method foo()')
                    )
                );

$tpl = new HTML_Template_ITX('./templates');
$tpl->loadTemplatefile('addblockfile_main.tpl.htm', true, true);

// The complete content of "addblockfile_main.tpl.htm" will be loaded into a block
// called "list_template". The placeholder {DESCRIPTION} will be replaced
// with the added block "list_template".
$tpl->addBlockfile('DESCRIPTION', 'list_template', 'addblockfile_list.tpl.htm');


// we now have the following blocks loaded:
// __global__, row, list_template and listelement
// lets assign the data.
foreach ($data as $entry) {
    // assign data to the inner block (listelement) of list_template.
    $tpl->setCurrentBlock('listelement');
    foreach ($entry['changelog'] as $changelogentry)  {
        $tpl->setVariable('ENTRY', $changelogentry);
        $tpl->parseCurrentBlock();
    }

    // assign data to the added list_template block
    $tpl->setCurrentBlock('list_template');
    $tpl->setVariable('LISTNAME', $entry['version']);
    $tpl->parseCurrentBlock();

    // back in the original templatefile we assign data to the row block
    // notice:
    //  {DESCRIPTION} is not longer available, because it was replaced by the
    //  list_template block
    $tpl->setCurrentBlock('row');
    $tpl->setVariable('NAME', $entry['packagename']);
    $tpl->parseCurrentBlock();
}

$tpl->show();
?>
