import { MenuGroup, MenuItem } from '@wordpress/components'
import { useSelect } from '@wordpress/data'
import { useEffect } from '@wordpress/element'
import { __ } from '@wordpress/i18n'
import { Icon } from '@wordpress/icons'
import { useContentHighlight } from '@draft/hooks/useContentHighlight'
import { wand, check, shorter, longer, magic } from '@draft/svg'

export const EditMenu = ({ disabled, setPrompt }) => {
    const { toggleHighlight } = useContentHighlight()
    const selectedBlockClientIds = useSelect(
        (select) => select('core/block-editor').getSelectedBlockClientIds(),
        [],
    )
    const { getBlocksByClientId } = useSelect(
        (select) => select('core/block-editor'),
        [],
    )

    useEffect(() => {
        return () => {
            toggleHighlight(selectedBlockClientIds, { isHighlighted: false })
        }
    }, [selectedBlockClientIds, toggleHighlight])

    const handleClick = (promptType) => {
        setPrompt({
            text: getSelectedContent(),
            promptType,
            systemMessageKey: 'edit',
        })
    }

    const getSelectedContent = () => {
        const selectedBlocks = getBlocksByClientId(selectedBlockClientIds)
        return selectedBlocks
            .map(({ attributes }) => attributes.content)
            .join('\n\n')
    }

    return (
        <MenuGroup>
            <MenuItem
                onClick={() => handleClick('improve-writing')}
                onMouseEnter={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: true,
                    })
                }
                onMouseLeave={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: false,
                    })
                }
                disabled={disabled}
                className="group">
                <Icon
                    icon={wand}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Improve writing', 'extendify')}
            </MenuItem>
            <MenuItem
                onClick={() => handleClick('fix-spelling-grammar')}
                onMouseEnter={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: true,
                    })
                }
                onMouseLeave={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: false,
                    })
                }
                disabled={disabled}
                className="group">
                <Icon
                    icon={check}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Fix spelling & grammar', 'extendify')}
            </MenuItem>
            <MenuItem
                onClick={() => handleClick('make-shorter')}
                onMouseEnter={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: true,
                    })
                }
                onMouseLeave={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: false,
                    })
                }
                disabled={disabled}
                className="group">
                <Icon
                    icon={shorter}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Make shorter', 'extendify')}
            </MenuItem>
            <MenuItem
                onClick={() => handleClick('make-longer')}
                onMouseEnter={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: true,
                    })
                }
                onMouseLeave={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: false,
                    })
                }
                disabled={disabled}
                className="group">
                <Icon
                    icon={longer}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Make longer', 'extendify')}
            </MenuItem>
            <MenuItem
                onClick={() => handleClick('simplify-language')}
                onMouseEnter={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: true,
                    })
                }
                onMouseLeave={() =>
                    toggleHighlight(selectedBlockClientIds, {
                        isHighlighted: false,
                    })
                }
                disabled={disabled}
                className="group">
                <Icon
                    icon={magic}
                    className="group-hover:text-current text-design-main fill-current w-5 h-5 mr-2"
                />
                {__('Simplify language', 'extendify')}
            </MenuItem>
        </MenuGroup>
    )
}
