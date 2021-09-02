import './index.scss'
import { render } from "react-dom"
import PhotoGallery from './js/PhotoGallery'

if ( document.getElementById("gallery") )
render(<PhotoGallery />, document.getElementById("gallery"))

import 'mptclayout/src/index.js'