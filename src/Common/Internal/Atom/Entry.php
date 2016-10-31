<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Internal\Atom;

use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Validate;

/**
 * The Entry class of ATOM standard.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class Entry extends AtomBase
{
    // @codingStandardsIgnoreStart

    /**
     * The author of the entry.
     *
     * @var Person[]
     */
    protected $author;

    /**
     * The category of the entry.
     *
     * @var Category[]
     */
    protected $category;

    /**
     * The content of the entry.
     *
     * @var Content
     */
    protected $content;

    /**
     * The contributor of the entry.
     *
     * @var Person[]
     */
    protected $contributor;

    /**
     * An unique ID representing the entry.
     *
     * @var string
     */
    protected $id;

    /**
     * The link of the entry.
     *
     * @var string
     */
    protected $link;

    /**
     * Is the entry published.
     *
     * @var bool
     */
    protected $published;

    /**
     * The copy right of the entry.
     *
     * @var string
     */
    protected $rights;

    /**
     * The source of the entry.
     *
     * @var string
     */
    protected $source;

    /**
     * The summary of the entry.
     *
     * @var string
     */
    protected $summary;

    /**
     * The title of the entry.
     *
     * @var string
     */
    protected $title;

    /**
     * Is the entry updated.
     *
     * @var \DateTime
     */
    protected $updated;

    /**
     * The extension element of the entry.
     *
     * @var string
     */
    protected $extensionElement;

    /**
     * Populate the properties of an ATOM Entry instance with specified XML..
     *
     * @param string $xmlString A string representing an ATOM entry instance
     */
    public function parseXml($xmlString)
    {
        Validate::notNull($xmlString, 'xmlString');
        $this->fromXml(simplexml_load_string($xmlString));
    }

    /**
     * Creates an ATOM ENTRY instance with specified simpleXML object.
     *
     * @param \SimpleXMLElement $entryXml xml element of ATOM ENTRY
     */
    public function fromXml(\SimpleXMLElement $entryXml)
    {
        Validate::notNull($entryXml, 'entryXml');

        $this->attributes = (array) $entryXml->attributes();
        $entryArray = (array) $entryXml;

        if (array_key_exists(Resources::AUTHOR, $entryArray)) {
            $this->author = $this->processAuthorNode($entryArray);
        }

        if (array_key_exists(Resources::CATEGORY, $entryArray)) {
            $this->category = $this->processCategoryNode($entryArray);
        }

        if (array_key_exists('content', $entryArray)) {
            $content = new Content();
            $content->fromXml($entryArray['content']);
            $this->content = $content;
        }

        if (array_key_exists(Resources::CONTRIBUTOR, $entryArray)) {
            $this->contributor = $this->processContributorNode($entryArray);
        }

        if (array_key_exists('id', $entryArray)) {
            $this->id = (string) $entryArray['id'];
        }

        if (array_key_exists(Resources::LINK, $entryArray)) {
            $this->link = $this->processLinkNode($entryArray);
        }

        if (array_key_exists('published', $entryArray)) {
            $this->published = $entryArray['published'];
        }

        if (array_key_exists('rights', $entryArray)) {
            $this->rights = $entryArray['rights'];
        }

        if (array_key_exists('source', $entryArray)) {
            $source = new Source();
            $source->parseXml($entryArray['source']->asXML());
            $this->source = $source;
        }

        if (array_key_exists('title', $entryArray)) {
            $this->title = $entryArray['title'];
        }

        if (array_key_exists('updated', $entryArray)) {
            $this->updated = \DateTime::createFromFormat(
                \DateTime::ATOM,
                (string) $entryArray['updated']
            );
        }
    }

    /**
     * Gets the author of the entry.
     *
     * @return Person[]
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author of the entry.
     *
     * @param Person[] $author The author of the entry
     */
    public function setAuthor(array $author)
    {
        $this->author = $author;
    }

    /**
     * Gets the category.
     *
     * @return Category[]
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category.
     *
     * @param Category[] $category The category of the entry
     */
    public function setCategory(array $category)
    {
        $this->category = $category;
    }

    /**
     * Gets the content.
     *
     * @return Content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content.
     *
     * @param Content $content Sets the content of the entry
     */
    public function setContent(Content $content)
    {
        $this->content = $content;
    }

    /**
     * Gets the contributor.
     *
     * @return Person[]
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * Sets the contributor.
     *
     * @param Person[] $contributor The contributor of the entry
     */
    public function setContributor(array $contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * Gets the ID of the entry.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the ID of the entry.
     *
     * @param string $id The id of the entry
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Gets the link of the entry.
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link of the entry.
     *
     * @param string $link The link of the entry
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Gets published of the entry.
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Sets published of the entry.
     *
     * @param bool $published Is the entry published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * Gets the rights of the entry.
     *
     * @return string
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Sets the rights of the entry.
     *
     * @param string $rights The rights of the entry
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * Gets the source of the entry.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets the source of the entry.
     *
     * @param string $source The source of the entry
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Gets the summary of the entry.
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Sets the summary of the entry.
     *
     * @param string $summary The summary of the entry
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * Gets the title of the entry.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the entry.
     *
     * @param string $title The title of the entry
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets updated.
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Sets updated.
     *
     * @param \DateTime $updated updated
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
    }

    /**
     * Gets extension element.
     *
     * @return string
     */
    public function getExtensionElement()
    {
        return $this->extensionElement;
    }

    /**
     * Sets extension element.
     *
     * @param string $extensionElement The extension element of the entry
     */
    public function setExtensionElement($extensionElement)
    {
        $this->extensionElement = $extensionElement;
    }

    /**
     * Writes a inner XML string representing the entry.
     *
     * @param \XMLWriter $xmlWriter The XML writer
     */
    public function writeXml(\XMLWriter $xmlWriter)
    {
        Validate::notNull($xmlWriter, 'xmlWriter');
        $xmlWriter->startElementNS(
            'atom',
            Resources::ENTRY,
            Resources::ATOM_NAMESPACE
        );
        $this->writeInnerXml($xmlWriter);
        $xmlWriter->endElement();
    }

    /**
     * Writes a inner XML string representing the entry.
     *
     * @param \XMLWriter $xmlWriter The XML writer
     */
    public function writeInnerXml(\XMLWriter $xmlWriter)
    {
        if (!is_null($this->attributes)) {
            if (is_array($this->attributes)) {
                foreach (
                    $this->attributes
                    as $attributeName => $attributeValue
                ) {
                    $xmlWriter->writeAttribute($attributeName, $attributeValue);
                }
            }
        }

        if (!is_null($this->author)) {
            $this->writeArrayItem(
                $xmlWriter,
                $this->author,
                Resources::AUTHOR
            );
        }

        if (!is_null($this->category)) {
            $this->writeArrayItem(
                $xmlWriter,
                $this->category,
                Resources::CATEGORY
            );
        }

        if (!is_null($this->content)) {
            $this->content->writeXml($xmlWriter);
        }

        if (!is_null($this->contributor)) {
            $this->writeArrayItem(
                $xmlWriter,
                $this->contributor,
                Resources::CONTRIBUTOR
            );
        }

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'id',
            Resources::ATOM_NAMESPACE,
            $this->id
        );

        if (!is_null($this->link)) {
            $this->writeArrayItem(
                $xmlWriter,
                $this->link,
                Resources::LINK
            );
        }

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'published',
            Resources::ATOM_NAMESPACE,
            $this->published
        );

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'rights',
            Resources::ATOM_NAMESPACE,
            $this->rights
        );

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'source',
            Resources::ATOM_NAMESPACE,
            $this->source
        );

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'summary',
            Resources::ATOM_NAMESPACE,
            $this->summary
        );

        $this->writeOptionalElementNS(
            $xmlWriter,
            'atom',
            'title',
            Resources::ATOM_NAMESPACE,
            $this->title
        );

        if (!is_null($this->updated)) {
            $xmlWriter->writeElementNS(
                'atom',
                'updated',
                Resources::ATOM_NAMESPACE,
                $this->updated->format(\DateTime::ATOM)
            );
        }
    }
}

// @codingStandardsIgnoreEnd
