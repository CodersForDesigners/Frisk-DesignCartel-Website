
#! /bin/bash

while getopts "p:" opt; do
	case ${opt} in
		p )
			PROJECT_DIR=${OPTARG}
			;;
	esac
done

# Establish symbolic links for the following directories:
# the media folder
rm -rf media
ln -s ../media/${PROJECT_DIR} media
# the cms folder
CMS_DIR="${PROJECT_DIR}-cms"
if [ "$PROJECT_DIR" = html ]; then
	CMS_DIR="cms"
fi
rm -rf cms
ln -s ../${CMS_DIR} cms
# # the BFS theme folder for the CMS
cd ../${CMS_DIR}/wp-content/themes
rm bfs
ln -s ../../../${PROJECT_DIR}/resources/wordpress-theme bfs
cd ../..
wp --allow-root theme activate bfs
cd ../${PROJECT_DIR}
