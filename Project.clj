(ns your-ns
  (:require [breaking-point.core :as bp]))
(re-frame/dispatch-sync [::bp/set-breakpoints
                         {;; required
                          :breakpoints [:mobile
                                        768
                                        :tablet 
                                        992
                                        :small-monitor
                                        1200
                                        :large-monitor]

                          ;; optional
                          :debounce-ms 166
                          }])

(re-frame/subscribe [::bp/screen-width]) ;; will be an int
(re-frame/subscribe [::bp/screen-height]) ;; will be an int
(re-frame/subscribe [::bp/screen]) ;; will be one of the following: :mobile, :tablet, :small-monitor, :large-monitor

(re-frame/subscribe [::bp/orientation]) ;; will be either :portrait or :landscape
(re-frame/subscribe [::bp/landscape?]) ;; true if width is >= height
(re-frame/subscribe [::bp/portrait?]) ;; true if height > width

;; these will be based on the breakpoint names that you provide
(re-frame/subscribe [::bp/mobile?]) ;; true if screen-width is < 768
(re-frame/subscribe [::bp/tablet?]) ;; true if screen-width is >= 768 and < 992
(re-frame/subscribe [::bp/small-monitor?]) ;; true if window width is >= 992 and < 1200
(re-frame/subscribe [::bp/large-monitor?]) ;; true if window width is >= 1200
