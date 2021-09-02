/**
 * External Dependencies
 */

import { render } from "react-dom"
import PhotoGallery from './PhotoGallery'


if ( document.getElementById("gallery") )
render(<PhotoGallery />, document.getElementById("gallery"))

import 'MPTCLayout/src/scripts/main.js'