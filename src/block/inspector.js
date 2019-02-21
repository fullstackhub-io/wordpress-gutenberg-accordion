/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/editor'

import {
  PanelBody,
  TextControl,
  ToggleControl,
} from '@wordpress/components'

/**
 * Block inspector control.
 *
 * @param {object} props component props
 * @returns {object} Component
 */
const Inspector = (props) => {
  const {
    attributes: {
      anchor,
      openByDefault,
    },
    setAttributes,
  } = props

  // Inspector Controls
  return (
    <InspectorControls>
      <PanelBody title={__('Settings')}>
        <TextControl
          label={__('Anchor Attribute')}
          help={__('An anchor is a unique text label you can use to link directly to this section inline.')}
          value={anchor}
          onChange={(anchor) => {
            setAttributes({anchor})
          }}
        />
        <ToggleControl
          label={__('Open By Default')}
          checked={!!openByDefault}
          onChange={(openByDefault) => {
            setAttributes({openByDefault})
          }}
          help={__('When toggled on, the accordion will be open when the page is loaded. Otherwise, it will be closed by default.')}
        />
      </PanelBody>
    </InspectorControls>
  )
}

export default Inspector
