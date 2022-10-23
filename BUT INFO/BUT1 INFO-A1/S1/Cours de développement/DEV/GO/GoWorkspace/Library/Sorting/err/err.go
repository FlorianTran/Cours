package err

import (
	"errors"
)

var ErrNotArray error = errors.New("n'est pas un tableau")
