package erreurs

import "errors"

var NoSuchElement error = errors.New("Collection vide")
