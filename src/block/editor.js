/**
 * External Dependencies
 */
import classnames from 'classnames'

/**
 * WordPress Dependencies
 */
import {
  InnerBlocks,
  RichText,
} from '@wordpress/editor'
import { Fragment } from '@wordpress/element'
import { __ } from "@wordpress/i18n";

/**
 * Internal Dependencies
 */
import Inspector from './inspector'

/**
 * Block edit component
 * @param {object} props
 */
const Editor = (props) => {
  const wrapperClasses = classnames(
    'td-accordion',
    'td-accordion--open',
  )

  const headerClasses  = classnames('td-accordion__header')
  const contentClasses = classnames('td-accordion__content')

  const {attributes: {headerContent},setAttributes,} = props

  return (
    <Fragment>
      <Inspector {...{...props}} />
      <div className={wrapperClasses}>
        <div className={headerClasses}>
          <RichText
            formattingControls={[]}
            onChange={headerContent => setAttributes({headerContent})}
            placeholder={__('Write your accordion header text…')}
            tagName='p'
            value={headerContent}
          />
        </div>
        <div className={contentClasses}>
          <InnerBlocks />
        </div>
      </div>
    </Fragment>
  )
}

export default Editor
