<?php
/**
 * This file is part of riesenia/pohoda package.
 *
 * Licensed under the MIT License
 * (c) RIESENIA.com
 */

declare(strict_types=1);

namespace Riesenia\Pohoda\Type;

use Riesenia\Pohoda\Agenda;
use Riesenia\Pohoda\Common\OptionsResolver;

class Link extends Agenda
{
    /** @var array */
    protected $_refElements = ['sourceDocument', 'settingsSourceDocument'];

    /** @var array */
    protected $_elements = ['sourceAgenda', 'sourceDocument', 'settingsSourceDocument'];

    /**
     * {@inheritdoc}
     */
    public function getXML(): \SimpleXMLElement
    {
        $xml = $this->_createXML()->addChild('typ:link', '', $this->_namespace('typ'));

        $this->_addElements($xml, $this->_elements, 'typ');

        return $xml;
    }

    /**
     * {@inheritdoc}
     */
    protected function _configureOptions(OptionsResolver $resolver)
    {
        // available options
        $resolver->setDefined($this->_elements);

        // validate / format options
        $resolver->setAllowedValues('sourceAgenda', ['issuedInvoice', 'receivedInvoice', 'receivable', 'commitment', 'issuedAdvanceInvoice', 'receivedAdvanceInvoice', 'offer', 'enquiry', 'receivedOrder', 'issuedOrder']);
    }
}
