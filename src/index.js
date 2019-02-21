/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n'
import { registerBlockType } from '@wordpress/blocks'

/**
 * Internal Dependencies
 */
import Editor from './block/editor'
import Render from './block/render'
import './style/style.scss'
import './style/editor.scss'

/**
 * Register slider block.
 */
registerBlockType('tomodomo/block-text-accordion', {
  title: __('Text Accordion'),
  keyword: [
    __('accordion'),
    __('text accordion'),
  ],
  icon: {
    background: '#963f69',
    foreground: '#FFFFFF',
    src: 'sort',
  },
  category: 'widgets',
  attributes: {
    anchor: {
      type: 'string',
      default: '',
    },
    headerContent: {
      type: 'array',
      source: 'children',
      selector: '.wp-block-tomodomo-block-text-accordion .td-accordion__header p',
    },
    openByDefault: {
      type: 'boolean',
      default: false,
    }
  },
  supports: {
    customClassName: false,
  },
  edit: Editor,
  save: Render,
})
