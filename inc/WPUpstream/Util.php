<?php
/**
 * @package WPOD
 * @version 0.0.1
 * @author Usability Dynamics Inc.
 */

namespace WPUpstream;

final class Util {
	public static function escape_shell_arg( $arg ) {
		$os = self::get_os();
		if ( $os === 'WIN' ) {
			return '"' . str_replace( "'", "'\\''", $arg ) . '"';
		}
		return escapeshellarg( $arg );
	}

	public static function is_path( $path ) {
		if ( ! empty( $path ) ) {
			if ( is_dir( $path ) || file_exists( $path ) ) {
				return true;
			}
		}
		return false;
	}

	public static function get_os() {
		return strtoupper( substr( php_uname( 's' ), 0, 3 ) );
	}
}