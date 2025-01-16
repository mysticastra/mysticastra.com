#!/bin/bash

# Define the pre-commit hook file path
HOOK_FILE=".git/hooks/pre-commit"

# Define the PHPStan script content
PHPSTAN_SCRIPT=$(cat <<'EOF'
#!/bin/bash

# Define PHPStan binary path
PHPSTAN="./vendor/bin/phpstan"

# Check if PHPStan is installed
if [ ! -f "$PHPSTAN" ]; then
    echo "PHPStan not found! Please install it via Composer: composer require --dev phpstan/phpstan"
    exit 1
fi

# Run PHPStan analysis
echo "Running PHPStan analysis..."
$PHPSTAN analyse --memory-limit=2G

# Check the result of PHPStan
if [ $? -ne 0 ]; then
    echo "PHPStan detected issues. Please fix them before committing."
    exit 1
fi

echo "PHPStan analysis passed. Proceeding with commit."
exit 0
EOF
)

# Ensure the hooks directory exists
if [ ! -d ".git/hooks" ]; then
    echo "Error: .git/hooks directory not found. Are you in the root of a Git repository?"
    exit 1
fi

# Write the script to the pre-commit hook file
echo "$PHPSTAN_SCRIPT" > "$HOOK_FILE"

# Make the pre-commit file executable
chmod +x "$HOOK_FILE"

echo "PHPStan pre-commit hook added successfully."
