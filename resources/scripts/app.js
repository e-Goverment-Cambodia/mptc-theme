/**
 * External Dependencies
 */

import 'MPTCLayout/src/scripts/main.js'
import { render } from "react-dom"
import PhotoGallery from './PhotoGallery'


if ( document.getElementById("gallery") )
render(<PhotoGallery />, document.getElementById("gallery"))
