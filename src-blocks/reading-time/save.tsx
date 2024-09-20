import { type BlockSaveProps } from '@wordpress/blocks';
import { type Attributes } from './edit';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 */
export default function save(props: BlockSaveProps<Attributes>) {
	const { attributes } = props;

	return (
		<div {...useBlockProps.save()} data-variant={attributes.variant}></div>
	);
}
